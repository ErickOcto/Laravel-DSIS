<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use App\Models\BookCategory;
use Illuminate\Http\Request;

class BookCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = BookCategory::all();
        return view('officer.category.index', compact('categories'));
    }

    public function create(){
        //
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        BookCategory::create($request->all());
        return redirect()->back()->with([
            'type' => 'success',
            'message' => 'Success added book category'
        ]);
    }

    public function edit(){
        //
    }

    public function destroy(){
        //
    }
    /**
     * Remove the specified resource from storage.
     */

    public function delete(string $id)
    {
        BookCategory::find($id)->delete;
        return redirect()->back();
    }
}
