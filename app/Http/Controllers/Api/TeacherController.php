<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeacherResource;
use App\Models\Classroom;
use App\Models\Major;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index(){
        $teachers = User::where('is_admin', 1)
        ->join('majors', 'majors.id', '=', 'users.major_id')
        ->join('classrooms', 'classrooms.id', '=', 'users.classroom_id')
        ->select('users.*', 'majors.name as major_name', 'classrooms.name as classroom_name')
        ->get();

        return new TeacherResource(true, "Successfully", $teachers);
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
            'is_admin' => 1,
            'nis' => $request->nis,
            'bio' => $request->bio,
        ]);
    }

    public function destroy($id){
        User::findOrFail($id)->delete();
    }

    public function show($id){
        $students = User::find($id);

        if (!$students) {
            return response()->json(['error' => 'Student not found'], 404);
        }

        return response()->json(['data' => $students], 200);
    }

    public function update(Request $request, $id){
        $classroom = Classroom::where('id', '=', $request->classroom_id)->first();
        $major = Major::where('id', $classroom->major_id)->first();

        $teachers = User::find($id);

        if (!$teachers) {
            return response()->json(['error' => 'Student not found'], 404);
        }

        $teachers->name = $request->input('name');
        $teachers->email = $request->input('email');
        if ($request->filled('password')) {
            $teachers['password'] = bcrypt($request->password);
        }
        $teachers->classroom_id = $classroom->id;
        $teachers->major_id = $major->id;
        $teachers->nis = $request->nis;
        $teachers->bio = $request->bio;

        $teachers->save();

        return response()->json(['message' => 'Officer updated successfully', 'data' => $teachers], 200);
    }

    public function showDetail($id){
        $teacher = User::where('users.id', $id)
        ->join('majors', 'majors.id', '=', 'users.major_id')
        ->join('classrooms', 'classrooms.id', '=', 'users.classroom_id')
        ->select('users.*', 'majors.name as major_name', 'classrooms.name as classroom_name')
        ->first();

        return response()->json(['data' => $teacher], 200);
    }

    public function searchTeacher(Request $request){
        $request->validate([
            'name' => 'string|required',
        ]);
        if($request->has('name')) {
            $teachers = User::where(function($query) use ($request) {
                $query->where('name', 'like', '%' . $request->name . '%')
                      ->orWhere('email', 'like', '%' . $request->name . '%')
                      ->orWhere('nis', 'like', '%' . $request->name . '%');
            })
            ->where('is_admin', '=', 1)
            ->get();
        } else {
            $teachers = User::where('is_admin', 1)->get();
        }
        return new TeacherResource(true, 'Success', $teachers);
    }
}
