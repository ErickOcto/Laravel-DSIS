<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeacherResource;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        // $students = User::where('is_admin', 2)->get();

        $students = User::where('is_admin', 2)
        ->join('majors', 'majors.id', '=', 'users.major_id')
        ->join('classrooms', 'classrooms.id', '=', 'users.classroom_id')
        ->select('users.*', 'majors.name as major_name', 'classrooms.name as classroom_name')
        ->get();

        return new TeacherResource(true, "Sukses Terus Le", $students);
    }
}
