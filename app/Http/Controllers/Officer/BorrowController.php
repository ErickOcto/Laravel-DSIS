<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BorrowController extends Controller
{
    public function index(Request $request){
        $borrows = Borrow::with('users', 'books')->get();

        //dd($borrows);
        return view('officer.borrow.index', compact('borrows'));
    }

    public function create(){
        return view('officer.borrow.create-search');
    }

    public function returnBook($id){
        $borrow = Borrow::findOrFail($id);

        $borrow->update([
            'return_date' => Carbon::now(),
        ]);

        return redirect()->route('officer.borrow.index')->with([ 'success' => "Berhasil mengubah data"]);
    }

    public function userSearch(Request $request){
        $query = $request->input('query');
        $bookQuery = $request->input('book');

        $users = User::where('nis', $query)->where('is_admin', 2)
        ->orWhere('email', $query)
        ->first();

        // if($users->is_admin !== 2){
        //     return redirect()->back()->with(['error' => "User tidak ditemukan"]);
        // }

        $books = Book::where('book_code', $bookQuery)
        ->first();

        //dd($books);

        return view('officer.borrow.create', compact('users', 'query', 'books', 'bookQuery'));
    }
}
