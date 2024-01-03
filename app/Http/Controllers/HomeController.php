<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboardAdmin(){
        return view('admin.dashboard');
    }
}
