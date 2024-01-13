<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany(User::class, 'borrows', 'user_id');
    }

    public function books()
    {
        return $this->belongsToMany(Book::class, 'borrows', 'book_id');
    }

}
