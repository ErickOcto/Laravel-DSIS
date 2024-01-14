<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoris = Category::all();
        return view('admin.kategori.index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $slug = $request->nama;
        $validators = Validator::make($request->all(), [
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

        if($validators->failed()){
            return redirect()->back();
        }

        Category::create([
            'nama' => $request->nama,
            'slug' => Str::slug($slug) . Str::random(5),
            'deskripsi' => $request->deskripsi,
            'user_id' => Auth::user()->id,
            'lihat' => 0
        ]);

        return redirect()->route('admin.category.index')->with([
            'success' => 'Sukses menambahkan kategori'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = Category::find($id);
        return view('admin.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kategori = Category::find($id);
        $validators = Validator::make($request->all(), [
            'nama' => 'required',
            'deskripsi' => 'required'
        ]);

        if($validators->fails()){
            return redirect()->back();
        }

        $kategori->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.category.index')->with(['success' => "Kategori berhasil diubah"]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $blog = Blog::where('category_id', $id)->first();

        if($blog != null){
            return redirect()->back()->with(['error' => "Kategori sudah memiliki beberapa blog"]);
        }

        Category::findOrFail($id)->delete();

        return redirect()->back()->with(['success' => "Kategori berhasil dihapus"]);
    }
}

