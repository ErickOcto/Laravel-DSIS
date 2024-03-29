<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'is_admin',
        'major_id',
        'bio',
        'classroom_id',
        'nis'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get the user that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    /**
     * Get the user that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Major()
    {
        return $this->belongsTo(Major::class);
    }

    public function classroom(){
        return $this->belongsTo(Classroom::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'teachers_subjects', 'id', 'subject_id');
    }

    public function classrooms()
    {
        return $this->belongsToMany(Classroom::class, 'teachers_subjects', 'id', 'classroom_id');
    }

    // protected function image(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($image) => asset('/storage/users/' . $image),
    //     );
    // }
}
