<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminTeacherClassroom extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function admin()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function teacherSubject()
    {
        return $this->belongsTo(TeachersSubject::class, 'teachers_subject_id');
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'id');
    }
}
