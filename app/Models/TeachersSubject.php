<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeachersSubject extends Model
{
    use HasFactory;

    protected $table = 'teachers_subjects';
    protected $guarded = [];
}
