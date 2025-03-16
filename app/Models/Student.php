<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable; // ✅ Sử dụng Authenticatable

class Student extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    protected $fillable = ['student_id', 'full_name', 'email', 'password', 'email_verified_at'
, 'verification_code'];

    protected $hidden = ['password'];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'enrollments');
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }
 

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
