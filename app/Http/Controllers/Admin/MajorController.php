<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $majors = Major::all();
        return view('admin.majors.index', compact('majors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.majors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'name' => 'required',
            'photo' => 'required',
        ]);

        if($validators->fails()){
            return redirect()->back();
        }

        $url = Str::slug($request->name);

        $photo = $request->file('photo');
        $photo->storeAs('public/majors', $photo->hashName());

        Major::create([
            'name' => $request->name,
            'photo' => $photo->hashName(),
            'description' => $request->description,
            'url' => $url,
        ]);

        return redirect()->route('admin.majors.index')->with([
            'success' => "Jurusan berhasil ditambahkan"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $major = Major::findOrFail($id);
        return view('admin.majors.edit', compact('major'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validators = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
        ]);

        if ($validators->fails()){
            return redirect()->back();
        }

        $major =  Major::findOrFail($id);

        $url = Str::slug($request->name);

        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            $photo->storeAs('public/majors/', $photo->hashName());

            Storage::delete('public/majors/'.$major->photo);

            $major->update([
                'photo' => $photo->hashName(),
                'name' => $request->name,
                'description' => $request->description,
                'url' => $url,
            ]);
        }else{
            $major->update([
            'name' => $request->name,
            'description' => $request->description,
            'url' => $url,
            ]);
        }

        return redirect()->route('admin.majors.index')->with(['success' => "Berhasil mengubah data jurusan"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $major = Major::findOrFail($id);
        Storage::delete('public/majors/' . $major->photo);
        $major->delete();
        return redirect()->back();
    }

    public function updateStatus(Request $request, $id){
        $major = Major::findOrFail($id);
        $major->update([
            'status' => $request->status
        ]);
        if($request->status == 1){
            return redirect()->back()->with(['success' => "Jurusan berhasil ditampilkan ke halaman landing"]);
        }
        return redirect()->back()->with(['success' => "Jurusan berhasil disembunyikan"]);
    }
}
