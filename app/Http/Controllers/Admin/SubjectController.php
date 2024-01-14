<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\TeachersSubject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('admin.subject.index', compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Subject::create($request->all());

        return redirect()->back()->with(['success' => "Data berhasil ditambahkan"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $check = TeachersSubject::where('subject_id', $id)->first();
        if($check){
            return redirect()->back()->with(['error' => "Mata pelajaran ini sudah memiliki beberapa penilaian"]);
        }
        Subject::findOrFail($id)->delete();
        return redirect()->back()->with(['success' => "Data berhasil dihapus"]);
    }
}
