<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeacherResource;
use App\Models\Classroom;
use App\Models\User;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index(){
    // $classrooms = Classroom::
    // join('users', 'users.classroom_id', '=', 'classrooms.id')
    // ->join('majors', 'classrooms.major_id', '=', 'majors.id')
    // ->select('classrooms.*', 'majors.name as classroom_name')
    // ->get();

    $classrooms = Classroom::select('classrooms.*', 'majors.name as classroom_name')
    ->join('users', 'users.classroom_id', '=', 'classrooms.id')
    ->join('majors', 'classrooms.major_id', '=', 'majors.id')
    ->selectRaw('classrooms.*, majors.name as classroom_name, COUNT(users.id) as user_count')
    ->groupBy('classrooms.id') // Group by classrooms.id agar penghitungan dilakukan per kelas
    ->get();


        return new TeacherResource(true, "Success Fetching Data", $classrooms);
    }
}
