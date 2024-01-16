<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        return view('student.assignment.index');
    }

    public function detail(){
        return view('student.assignment.detail');
    }
}
