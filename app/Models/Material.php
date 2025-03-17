<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'title', 'file_path',
'slug',
'video_path',
'short_description',
'description',
];
protected $casts = ['file_path'=> 'array'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function lessonResources()
    {
        return $this->hasMany(LessonResource::class);
    }
    
}
