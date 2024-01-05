<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'user_id' => Auth::user()->id,
            'url' => $url,
        ]);

        return redirect()->route('admin.majors.index')->with([
            'type' => 'success',
            'message' => 'successfully created'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        Major::find($id)->delete();
        return redirect()->back();
    }

    public function updateStatus(Request $request, $id){
        $major = Major::findOrFail($id);
        $major->update([
            'status' => $request->status
        ]);
        return redirect()->back();
    }
}
