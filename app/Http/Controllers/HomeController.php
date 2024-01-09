<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Major;
use App\Models\User;
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

    public function detailBlog(Blog $blog){
        //dd($blog);
        $latests = Blog::latest()->take(4)->where('id', '!=', $blog->id)->get();
        return view('landing.blog.detail', compact('blog', 'latests'));
    }

    public function updateLihat($id){
        $blog = Blog::findOrFail($id);
        $blog->update([
            'lihat' => $blog->lihat + 1
        ]);

        return redirect()->route('detail-blog', $blog->slug);
    }

    public function blog(){
        $blogs = Blog::orderBy('lihat', 'Desc')->take(4)->get();
        $latests = Blog::latest()->take(4)->get();
        return view('landing.blog.index', compact('blogs', 'latests'));
    }

    public function majors(Major $major){
        return view('landing.major.detail', compact('major'));
    }

    public function teachers(){
        $teachers = User::where('is_admin', 1)->get();
        return view('landing.teachers.index', compact('teachers'));
    }

    public function teacherDetails($id){
        $teacher = User::where('id', $id)->first();
        return view('landing.teachers.detail', compact('teacher'));
    }

}
