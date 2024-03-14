<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeacherResource;
use App\Models\Classroom;
use App\Models\Major;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $students = User::where('is_admin', 2)
        ->join('majors', 'majors.id', '=', 'users.major_id')
        ->join('classrooms', 'classrooms.id', '=', 'users.classroom_id')
        ->select('users.*', 'majors.name as major_name', 'classrooms.name as classroom_name')
        ->get();

        return new TeacherResource(true, " Successfully", $students);
    }

    public function getOption(){
        $majors = Major::all();
        $classrooms = Classroom::all();

        return response()->json(['majors' => $majors, 'classrooms' => $classrooms]);
    }

    public function store(Request $request){
        $classroom = Classroom::where('id', '=', $request->classroom_id)->first();
        $major = Major::where('id', $classroom->major_id)->first();

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'major_id' => $major->id,
            'classroom_id' => $request->classroom_id,
            'is_admin' => 2,
            'nis' => $request->nis,
        ]);
    }

    public function show($id){
        $students = User::find($id);

        if (!$students) {
            return response()->json(['error' => 'Student not found'], 404);
        }

        return response()->json(['data' => $students], 200);
    }

    public function destroy($id){
        User::findOrFail($id)->delete();
    }

    public function update(Request $request, $id){
        $classroom = Classroom::where('id', '=', $request->classroom_id)->first();
        $major = Major::where('id', $classroom->major_id)->first();

        $student = User::find($id);

        if (!$student) {
            return response()->json(['error' => 'Student not found'], 404);
        }

        $student->name = $request->input('name');
        $student->email = $request->input('email');
        if ($request->filled('password')) {
            $student['password'] = bcrypt($request->password);
        }
        $student->classroom_id = $classroom->id;
        $student->major_id = $major->id;
        $student->nis = $request->nis;

        $student->save();

        return response()->json(['message' => 'Officer updated successfully', 'data' => $student], 200);
    }

    public function searchStudent(Request $request){
        $request->validate([
            'name' => 'string|required',
        ]);
        if($request->has('name')) {
            $students = User::where(function($query) use ($request) {
                $query->where('name', 'like', '%' . $request->name . '%')
                      ->orWhere('email', 'like', '%' . $request->name . '%')
                      ->orWhere('nis', 'like', '%' . $request->name . '%');
            })
            ->where('is_admin', '=', 2)
            ->get();
        } else {
            $students = User::where('is_admin', 2)->get();
        }
        return new TeacherResource(true, 'Success', $students);
    }

    public function showDetail($id){
        $teacher = User::where('users.id', $id)
        ->join('majors', 'majors.id', '=', 'users.major_id')
        ->join('classrooms', 'classrooms.id', '=', 'users.classroom_id')
        ->select('users.*', 'majors.name as major_name', 'classrooms.name as classroom_name')
        ->first();

        return response()->json(['data' => $teacher], 200);
    }
}
