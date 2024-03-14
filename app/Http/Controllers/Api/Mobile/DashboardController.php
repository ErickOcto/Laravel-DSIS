<?php

namespace App\Http\Controllers\Api\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeacherResource;
use App\Models\Classroom;
use App\Models\Major;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function classroomTotal(){
        $totalClass = Classroom::count();
        return new TeacherResource(true, 'Success', $totalClass);
    }

    public function studentTotal(){
        $users = User::where('is_admin', 2)->where('classroom_id', '!=', null)->count();
        return new TeacherResource(true, 'Success', $users);
    }

    public function teacherTotal(){
        $users = User::where('is_admin', 1)->count();
        return new TeacherResource(true, 'Success', $users);
    }

    public function officerTotal(){
        $users = User::where('is_admin', 3)->count();
        return new TeacherResource(true, 'Success', $users);
    }

    public function majorTotal(){
        $majors = Major::count();
        return new TeacherResource(true, 'Success', $majors);
    }

    public function currentUser(){
        $currentUser = Auth::user()->name ?? null;

        return new TeacherResource(true, 'Success', $currentUser);
    }
}
