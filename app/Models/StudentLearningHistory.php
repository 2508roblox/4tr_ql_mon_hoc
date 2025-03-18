<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentLearningHistory extends Model
{
    use HasFactory;

    protected $table = 'student_learning_history';

    protected $fillable = [
        'student_id',
        'lesson_resource_id',
        'started_at',
        'completed_at',
        'is_completed'
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'completed_at' => 'datetime',
        'is_completed' => 'boolean'
    ];

    /**
     * Lấy thông tin học viên
     */
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    /**
     * Lấy thông tin tài liệu bài học
     */
    public function lessonResource()
    {
        return $this->belongsTo(LessonResource::class);
    }

    /**
     * Lấy thông tin bài học
     */
    public function lesson()
    {
        return $this->belongsTo(Material::class, 'lesson_id');
    }

    /**
     * Cập nhật thời gian xem
     */
    public function updateWatchDuration($duration)
    {
        $this->watch_duration = $duration;
        $this->save();
    }

    /**
     * Đánh dấu hoàn thành
     */
    public function markAsCompleted()
    {
        $this->is_completed = true;
        $this->completed_at = now();
        $this->save();
    }

    /**
     * Kiểm tra xem học viên đã hoàn thành tài liệu chưa
     */
    public static function isCompleted($studentId, $lessonResourceId)
    {
        return self::where('student_id', $studentId)
            ->where('lesson_resource_id', $lessonResourceId)
            ->where('is_completed', true)
            ->exists();
    }

    /**
     * Lấy lịch sử học của một học viên
     */
    public static function getStudentHistory($studentId)
    {
        return self::with(['lessonResource', 'lesson'])
            ->where('student_id', $studentId)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * Lấy tổng thời gian học của học viên
     */
    public static function getTotalWatchDuration($studentId)
    {
        return self::where('student_id', $studentId)
            ->sum('watch_duration');
    }
    public static function trackProgress($studentId, $lessonResourceId)
    {
        $history = self::firstOrCreate(
            ['student_id' => $studentId, 'lesson_resource_id' => $lessonResourceId],
            ['started_at' => now(), 'is_completed' => false]
        );

        // Nếu chưa hoàn thành thì cập nhật lại thời gian bắt đầu
        if (!$history->is_completed) {
            $history->update(['started_at' => now()]);
        }
    }
    
} 