<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BlogController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::get();
        $jumlahBlog = count($blogs);
        $jumlahView = Blog::sum('lihat');
        return view('admin.blog.index', compact('blogs', 'jumlahBlog', 'jumlahView'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'judul' => 'required',
            'konten' => 'required',
            'category_id' => 'required',
            'photo' => 'required',
        ]);

        if($validators->fails()){
            return redirect()->back();
        }

        $slug = Str::slug($request->judul) . '-' . Str::random(5);

        $image = $request->file('photo');
        $image->storeAs('public/blogs', $image->hashName());

        Blog::create([
            'photo' => $image->hashName(),
            'judul' => $request->judul,
            'konten' => $request->konten,
            'slug' => $slug,
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'lihat' => 0
        ]);

        return redirect()->route('admin.blog.index')->with([
            'success' => "Sukses Menambahkan blog"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $blog = Blog::findOrFail($id);
        return view('admin.blog.edit', compact('categories', 'blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $blog = Blog::findOrFail($id);
        $validators = Validator::make($request->all(), [
            'judul' => 'required',
            'konten' => 'required',
            'kategori_id' => 'required',
        ]);

        //dd($request->all());

        if($validators->fails()){
            return redirect()->back()->with([
                'error' => "Gagal menyimpan"
            ]);
        }



        $slug = Str::slug($request->judul) . '-' . Str::random(5);

        if ($request->hasFile('photo')){
        $image = $request->file('photo');
        $image->storeAs('public/blogs', $image->hashName());

        Storage::delete('public/blogs/'.$blog->photo);

        $blog->update([
            'photo' => $image->hashName(),
            'judul' => $request->judul,
            'konten' => $request->konten,
            'slug' => $slug,
            'category_id' => $request->kategori_id,
        ]);
        }else{
        $blog->update([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'slug' => $slug,
            'category_id' => $request->kategori_id,
        ]);
        }

        return redirect()->route('admin.blog.index')->with([
            'success' => "Berhasil menyimpan perubahan"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $blog = Blog::findOrFail($id);
        Storage::delete('public/blogs/', $blog->photo);
        $blog->delete();

        return redirect()->back()->with([
            'success' => "Blog berhasil dihapus"
        ]);
    }

    public function updateStatus(Request $request, $id){
        $blog = Blog::findOrFail($id);
        $blog->update([
            'carousel' => $request->carousel,
        ]);

        if($request->carousel == 0){
            return redirect()->route('admin.blog.index')->with(['success' => "Berhasil menyembunyikan blog dari carousel"]);
        }

        return redirect(route('admin.blog.index'))->with(['success' => "Berhasil menambahkan blog ke carousel"]);
    }
}
