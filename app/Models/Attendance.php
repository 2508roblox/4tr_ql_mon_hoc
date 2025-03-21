<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'course_id', 'week', 'status', 'date'];
    protected $table = 'attendance';

    // Đảm bảo week chỉ từ 1-12
    protected static function boot()
    {
        parent::boot();
        
        static::saving(function ($attendance) {
            if ($attendance->week < 1 || $attendance->week > 12) {
                throw new \Exception('Tuần học phải từ 1 đến 12');
            }
        });
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
