<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function index(){
        $tasks = Assessment::where('user_id', Auth::user()->id)->get();

        return view('student.assignment.index', compact('tasks'));
    }
}
