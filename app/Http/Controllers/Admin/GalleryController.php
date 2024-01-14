<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(){
        $galleries = Gallery::all();
        return view('admin.gallery.index', compact('galleries'));
    }

    public function store(){
        return redirect()->back()->with(['success', "Data galeri berhasil ditambahkan."]);
    }

    public function delete(){

    }
}
