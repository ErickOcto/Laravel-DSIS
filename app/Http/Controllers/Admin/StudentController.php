<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Major;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('is_admin', 2)->get();
        // $users = Classroom::leftJoin('majors', 'classrooms.major_id', '=', 'majors.id')
        //          ->leftJoin('users', 'classrooms.id', '=', 'users.classroom_id')
        //          ->where('users.is_admin', 2)
        //          ->select('users.name as name', 'majors.name as major_name',
        //          'classrooms.name as classroom_name', 'users.created_at as created_at',
        //          'users.image as photo', 'users.id as id', 'users.email as email')
        //          ->get();

        //dd($users);
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classrooms = Classroom::all();
        $majors = Major::all();
        return view('admin.user.create', compact('majors', 'classrooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $classroom = Classroom::where('id', '=', $request->classroom_id)->first();

        $major = Major::where('id', $classroom->major_id)->first();

        $validators = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'classroom_id' => 'required',
        ]);

        if($validators->fails()){
            return redirect()->back()->with([
                'error' => 'Gagal menambahkan siswa',
            ]);
        }

        $image = $request->file('photo');
        $image->storeAs('public/users', $image->hashName());

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'major_id' => $major->id,
            'classroom_id' => $request->classroom_id,
            'is_admin' => 2,
            'nis' => $request->nis,
            'image' => $image->hashName(),
        ]);

        return redirect(route('admin.user.index'))->with(['success' => "Siswa berhasil dibuat"]);
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
        $user = User::findOrFail($id);
        $classrooms = Classroom::all();
        return view('admin.user.edit', compact('classrooms', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $classroom = Classroom::where('id', '=', $request->classroom_id)->first();

        $major = Major::where('id', $classroom->major_id)->first();

        $user = User::findOrFail($id);

        if($request->hasFile('photo')){
            $image = $request->file('photo');
            $image->storeAs('public/users', $image->hashName());

            Storage::delete('public/users' . $user->image);

            $updateData = [
                'name' => $request->name,
                'email' => $request->email,
                'nis' => $request->nis,
                'image' => $image->hashName(),
                'classroom_id' => $request->classroom_id,
                'major_id' => $major->id,
            ];

            if ($request->filled('password')) {
                $updateData['password'] = bcrypt($request->password);
            }

            $user->update($updateData);
        }else{
            $updateData = [
                'name' => $request->name,
                'email' => $request->email,
                'nis' => $request->nis,
                'classroom_id' => $request->classroom_id,
                'major_id' => $major->id,
            ];

            if ($request->filled('password')) {
                $updateData['password'] = bcrypt($request->password);
            }

            $user->update($updateData);
        }
            return redirect()->route('admin.user.index')->with([ 'success' => "Data siswa berhasil diubah" ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $user = User::findOrFail($id);
        Storage::delete('public/users/' . $user->image);
        $user->delete();
        return redirect()->route('admin.user.index')->with(['success' => "Data siswa berhasil dihapus"]);
    }
}
