<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index(){
        $books = Borrow::join('books', 'books.id', '=', 'borrows.book_id')
        ->where('user_id', Auth::user()->id)
        ->select('books.title as title', 'books.image as image', 'books.book_code as book_code', 'books.author as author')
        ->get();



        //dd();
        return view('student.book.index', compact('books'));
    }
}
