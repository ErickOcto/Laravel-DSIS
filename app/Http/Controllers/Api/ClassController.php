<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeacherResource;
use App\Models\Classroom;
use App\Models\Major;
use App\Models\TeachersSubject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassController extends Controller
{
    public function index(){
    // $classrooms = Classroom::
    // join('users', 'users.classroom_id', '=', 'classrooms.id')
    // ->join('majors', 'classrooms.major_id', '=', 'majors.id')
    // ->select('classrooms.*', 'majors.name as classroom_name')
    // ->get();

$classrooms = Classroom::leftJoin('users', 'users.classroom_id', '=', 'classrooms.id')
    ->join('majors', 'classrooms.major_id', '=', 'majors.id')
    ->select('classrooms.*', 'majors.name as classroom_name', 'majors.photo as classroom_photo', DB::raw('COALESCE(COUNT(users.id), 0) as user_count'))
    ->groupBy('classrooms.id')
    ->get();


        return new TeacherResource(true, "Success Fetching Data", $classrooms);
    }

    public function destroy($id){
        $class = Classroom::findOrFail($id);

        User::where('classroom_id', $id)->delete();

        TeachersSubject::where('classroom_id', $id)->delete();

        $class->delete();
        return response()->json(['success' => "Berhasil menghapus kelas"]);
    }

    public function getOption(){
        $majors = Major::all();

        return response()->json(['majors' => $majors]);
    }

    public function store(Request $request){
        Classroom::create($request->all());
    }
}
