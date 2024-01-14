<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Major;
use App\Models\TeachersSubject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $class = Classroom::all();
        $majors = Major::all();
        return view('admin.classroom.index', compact('class', 'majors'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'name' => 'required',
            'major_id' => 'required',
        ]);

        if($validators->fails()){
            return redirect()->back()->with(['error' =>'Gagal menyimpan data']);
        }

        Classroom::create($request->all());

        return redirect()->back()->with(['success' => "Data berhasil ditambahkan"]);
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
        $class = Classroom::findOrFail($id);

        $checkUser = User::where('classroom_id', $id)->first();

        $checkTeacherSubject = TeachersSubject::where('classroom_id', $id)->first();

        if($checkTeacherSubject != null || $checkUser != null){
            return redirect()->back()->with(['error' => 'Sepertinya kelas ini sudah memiliki beberapa siswa']);
        }

        $class->delete();
        return redirect()->back()->with(['success' => "Berhasil menghapus kelas"]);
    }

    public function deleteUser(string $id)
    {
        $class = Classroom::findOrFail($id);

        User::where('classroom_id', $id)->delete();

        TeachersSubject::where('classroom_id', $id)->delete();

        $class->delete();
        return redirect()->back()->with(['success' => "Berhasil menghapus kelas"]);
    }
}
