<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Major;
use App\Models\Subject;
use App\Models\TeachersSubject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('is_admin', 1)->get();
        return view('admin.teacher.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classrooms = Classroom::all();
        $majors = Major::all();
        return view('admin.teacher.create', compact('classrooms', 'majors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'photo' => 'image|mimes:png,jpg,jpeg,gif',
            'major_id' => 'required',
            'name' => 'required',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:8',
        ]);

        if($validators->fails()){
            return redirect()->back();
        }

        $image = $request->file('photo');
        $image->storeAs('public/users', $image->hashName());

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'bio' => $request->bio,
            'image' => $image->hashName(),
            'is_admin' => 1,
            'major_id' => $request->major_id,
        ]);

        return redirect()->route('admin.teacher.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $teacher = User::findOrFail($id);
        $classes = Classroom::all();
        $subjects = Subject::all();
        $users = DB::table('teachers_subjects')
                ->join('users', 'teachers_subjects.user_id', '=', 'users.id')
                ->join('subjects', 'teachers_subjects.subject_id', '=', 'subjects.id')
                ->join('classrooms', 'teachers_subjects.classroom_id', '=', 'classrooms.id')
                ->select('classrooms.name as classroom_name', 'subjects.name as subject_name', 'teachers_subjects.id as id')
                ->get();
        return view('admin.teacher.detail', compact('teacher', 'classes', 'subjects', 'users'));
    }

    public function addsub(Request $request){
        $validators = Validator::make($request->all(), [
            'user_id' => 'required',
            'classroom_id' => 'required',
            'subject_id' => 'required',
        ]);

        if($validators->fails()){
            return redirect()->back();
        }

        TeachersSubject::create($request->all());

        return redirect()->back()->with(['success' => "Data mata pelajaran dan kelas berhasil ditambahkan"]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.teacher.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $teacher = User::findOrFail($id);
    
        $updateData = [
            'name' => $request->name,
            'email' => $request->email,
            'bio' => $request->bio,
            'major_id' => $request->major_id,
        ];
    
        if ($request->filled('password')) {
            // Jika password diisi, tambahkan ke data pembaruan
            $updateData['password'] = bcrypt($request->password);
        }
    
        $teacher->update($updateData);
    
        return redirect()->route('admin.teacher.index')->with(['success' => "Data guru berhasil diubah"]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        User::findOrFail($id)->delete();
        return redirect()->back()->with(['success' => "Data guru berhasil dihapus"]);
    }

    public function delsub(string $id)
    {
        TeachersSubject::findOrFail($id)->delete();
        return redirect()->back()->with(['success' => "Data berhasil dihapus"]);
    }
}
