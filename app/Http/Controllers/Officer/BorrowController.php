<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BorrowController extends Controller
{
    public function index(Request $request){
        // $borrows = Borrow::with('users', 'books')->get();
        $borrows = DB::table('borrows')
        ->join('users', 'borrows.user_id', '=', 'users.id')
        ->join('books', 'borrows.book_id', '=', 'books.id')
        ->select('users.name as name', 'books.title as title', 'books.book_code as book_code', 'users.nis as nis', 'borrows.borrow_date as borrow_date', 'borrows.return_date as return_date', 'borrows.id as id')
        ->get();

        //dd($borrows);
        return view('officer.borrow.index', compact('borrows'));
    }

    public function create(){
        return view('officer.borrow.create-search');
    }

    public function post(Request $request){
        $validators = Validator::make($request->all(), [
            'user_id' => 'required',
            'book_id' => 'required',
        ]);

        if($validators->fails()){
            return redirect()->back()->with(['error' => 'Ups! Sepertinya ada yang salah']);
        }

        $checkUser = Borrow::where('user_id', '=', $request->user_id)->where('book_id', '=', $request->book_id)->where('return_date', '=', null)->first();

        //dd($checkUser);
        if($checkUser !== null){
            return redirect()->back()->with(['error' => "Siswa belum mengembalikan buku yang sama"]);
        }

        $check = Book::where('id', '=', $request->book_id)->where('stock', '=', '0')->first();
        if($check){
            return redirect()->back()->with(['error' => "Stock Buku Ini Tidak Tersedia"]);
        }

        $book = Book::where('id', '=', $request->book_id)->first();

        $book->update([
            'view' => $book->view + 1
        ]);

        Borrow::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'borrow_date' => Carbon::now(),
        ]);

        $book = Book::where('id', '=', $request->book_id)->first();

        $book->update([
            'stock' => $book->stock - 1
        ]);

        return redirect()->route('officer.borrow.index')->with(['success' => "Berhasil memproses peminjaman"]);
    }

    public function returnBook($id){
        $borrow = Borrow::findOrFail($id);

        $borrow->update([
            'return_date' => Carbon::now(),
        ]);

        $book = Book::where('id', '=', $borrow->book_id)->first();

        $book->update([
            'stock' => $book->stock + 1
        ]);

        return redirect()->route('officer.borrow.index')->with([ 'success' => "Berhasil mengubah data"]);
    }

    public function userSearch(Request $request){
        $query = $request->input('query');
        $bookQuery = $request->input('book');

        $users = User::where('nis', $query)->where('is_admin', '=', 2)
        ->orWhere('email', $query)->where('is_admin', '=', 2)
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
