<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use App\Models\Borrow;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    public function index(){
        $borrows = Borrow::all();
        return view('officer.borrow.index', compact('borrows'));
    }

    public function create(){
        return view('officer.borrow.create');
    }
}
