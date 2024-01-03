<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $blogs = Blog::orderBy('lihat', 'Desc')->take(4)->get();
        $latests = Blog::latest()->take(4)->get();
        $carousel = Blog::where('carousel', 1)->get();
        return view('welcome', compact('blogs', 'latests', 'carousel'));
    }
    public function dashboardAdmin(){
        return view('admin.dashboard');
    }
}
