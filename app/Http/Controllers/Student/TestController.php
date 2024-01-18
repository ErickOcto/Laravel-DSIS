<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index(){
        $tasks = DB::table('assessments')
        ->where('assessments.user_id', Auth::user()->id)
        ->join('teachers_subjects', 'teachers_subjects.id', '=', 'assessments.teacher_subject_id')
        ->leftJoin('users', 'users.id', '=', 'teachers_subjects.user_id')
        ->leftJoin('subjects', 'subjects.id', '=', 'teachers_subjects.subject_id')
        ->select('assessments.*', 'users.name as name', 'subjects.name as subject')
        ->get();

        return view('student.assignment.index', compact('tasks'));
    }
}
