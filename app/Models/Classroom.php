<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the user that owns the Classroom
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function teachers()
    {
        return $this->belongsToMany(User::class, 'teachers_subjects', 'id', 'user_id');
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
