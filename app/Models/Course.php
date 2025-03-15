<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_name',
        'short_description', // Mô tả ngắn
        'image', // Ảnh khóa học
        'views', // Lượt xem
        'description', // Mô tả chi tiết
        'created_by', // Người tạo khóa học
        'slug', // Người tạo khóa học
    ];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'enrollments');
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
