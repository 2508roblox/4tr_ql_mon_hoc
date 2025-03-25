<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'student_id',
        'file_path',
        'image',
        'score',
        'comment',
        'submitted_at'
    ];

    protected $casts = [
        'submitted_at' => 'datetime',
        'score' => 'float'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
