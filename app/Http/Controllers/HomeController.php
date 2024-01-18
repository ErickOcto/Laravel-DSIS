<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Classroom;
use App\Models\Gallery;
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
        $popularBlogs = Blog::orderBy('lihat', 'Desc')->take(3)->get();
        return view('admin.dashboard', compact('popularBlogs'));
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

        $categories = Category::where('id', '=', $blog->category_id)->first();

        //dd($categories);
        $categories->update([
            'lihat' => $categories->lihat + 1
        ]);

        return redirect()->route('detail-blog', $blog->slug);
    }

    public function blog(){
        $blogs = Blog::orderBy('lihat', 'Desc')->take(4)->get();
        $all = Blog::latest()->paginate(8);
        return view('landing.blog.index', compact('blogs', 'all'));
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

    // For Facility
    public function facilities(){
        return view('landing.facilities.index');
    }

    public function gallery(){
        $galleries = Gallery::where('status', 1)->get();
        return view('landing.gallery.index', compact('galleries'));
    }

}
