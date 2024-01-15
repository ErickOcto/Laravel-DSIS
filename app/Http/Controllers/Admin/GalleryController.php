<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    public function index(){
        $galleries = Gallery::all();
        return view('admin.gallery.index', compact('galleries'));
    }

    public function store(Request $request){
        $validators = Validator::make($request->all(), [
            'image' => 'required',
        ]);

        if($validators->fails()){
            return redirect()->back()->with(['error' => "Gagal menambahkan galeri"]);
        }

        $image = $request->file('image');
        $image->storeAs('public/gallery', $image->hashName());

        Gallery::create([
            'image' => $image->hashName(),
            'status' => 0
        ]);

        return redirect()->back()->with(['success' => "Data galeri berhasil ditambahkan"]);
    }

    public function update(Request $request, $id){
        Gallery::find($id)->update($request->all());
        if($request->status == 0){
            return redirect()->back()->with(['success' => "Data galeri berhasil dihilangkan"]);
        }
        return redirect()->back()->with(['success' => "Data galeri berhasil dimunculkan"]);
    }

    public function delete($id){

        $gallery = Gallery::findOrFail($id);
        Storage::delete('public/gallery/' . $gallery->image);
        $gallery->delete();

        return redirect()->back()->with(['success' => "Data galeri berhasil dihapus"]);
    }
}
