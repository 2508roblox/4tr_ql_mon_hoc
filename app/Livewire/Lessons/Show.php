<?php

namespace App\Livewire\Lessons;

use Livewire\Component;
use App\Models\Material;
use App\Models\Course;
use App\Models\StudentLearningHistory;
use Illuminate\Support\Facades\Auth;

class Show extends Component
{
    public $lesson;
    public $course;
    public $lessons;
    public $currentResource;
    public $searchQuery = '';
    public $completedResourcesCount = [];

    public function mount($lesson, $lesson_resource_id = null)
    {
        // Lấy thông tin bài học theo ID hoặc slug
        $this->lesson = Material::where('id', $lesson)->with('lessonResources')->firstOrFail();

        // Lấy thông tin khóa học của bài học này
        $this->course = $this->lesson->course()->with(['creator', 'feedbacks', 'materials'])->first();

        // Lấy danh sách tất cả bài học trong cùng khóa học
        $this->lessons = $this->course->materials()->get();

        // Xử lý lesson resource
        $this->setCurrentResource($lesson_resource_id);

        // Lưu lịch sử học
        $this->saveLearningHistory();

        // Tính toán số lượng resource đã học cho từng bài học
        $this->calculateCompletedResources();
    }

    /**
     * Tính toán số lượng resource đã học cho từng bài học
     */
    protected function calculateCompletedResources()
    {
        if (!Auth::guard('student')->check()) {
            return;
        }

        $studentId = Auth::guard('student')->id();

        foreach ($this->lessons as $lesson) {
            // Lấy tất cả resource của bài học
            $resources = $lesson->lessonResources()->get();
            $totalResources = $resources->count();

            // Đếm số resource đã hoàn thành
            $completedCount = StudentLearningHistory::where('student_id', $studentId)
                ->whereIn('lesson_resource_id', $resources->pluck('id'))
                ->where('is_completed', true)
                ->count();

            $this->completedResourcesCount[$lesson->id] = [
                'completed' => $completedCount,
                'total' => $totalResources
            ];
        }
    }

    public function setCurrentResource($lesson_resource_id)
    {
        if ($lesson_resource_id) {
            $this->currentResource = $this->lesson->lessonResources()->findOrFail($lesson_resource_id);
        } else {
            $this->currentResource = $this->lesson->lessonResources()->first();
        }

        // Lưu trạng thái học
        $this->saveLearningHistory();
    }

    /**
     * Lưu lịch sử học
     */
    protected function saveLearningHistory()
    {
        if (!Auth::guard('student')->check()) {
            return;
        }

        $studentId = Auth::guard('student')->id();
        $resourceId = $this->currentResource->id;

        // Kiểm tra xem đã có bản ghi chưa
        $history = StudentLearningHistory::where('student_id', $studentId)
            ->where('lesson_resource_id', $resourceId)
            ->first();

        if (!$history) {
            // Tạo bản ghi mới
            StudentLearningHistory::create([
                'student_id' => $studentId,
                'lesson_resource_id' => $resourceId,
                'started_at' => now(),
                'is_completed' => false
            ]);
        } else {
            // Cập nhật thời gian bắt đầu nếu chưa hoàn thành
            if (!$history->is_completed) {
                $history->is_completed = true;
                $history->started_at = now();
                $history->save();
            }
        }

        // Cập nhật lại số lượng resource đã học
        $this->calculateCompletedResources();
    }

    /**
     * Đánh dấu hoàn thành bài học
     */
    public function markAsCompleted()
    {
        if (!Auth::check()) {
            return;
        }

        $studentId = Auth::id();
        $resourceId = $this->currentResource->id;

        $history = StudentLearningHistory::where('student_id', $studentId)
            ->where('lesson_resource_id', $resourceId)
            ->first();

        if ($history) {
            $history->markAsCompleted();
        }
    }

    public function updatedSearchQuery()
    {
        if (empty($this->searchQuery)) {
            $this->lessons = $this->course->materials()->get();
            return;
        }

        $this->lessons = $this->course->materials()
            ->where(function($query) {
                $query->where('title', 'like', '%' . $this->searchQuery . '%')
                    ->orWhereHas('lessonResources', function($q) {
                        $q->where('name', 'like', '%' . $this->searchQuery . '%');
                    });
            })
            ->get();
    }

    public function render()
    {
        return view('livewire.lessons.show', [
            'lesson' => $this->lesson,
            'course' => $this->course,
            'lessons' => $this->lessons,
            'currentResource' => $this->currentResource,
            'completedResourcesCount' => $this->completedResourcesCount
        ]);
    }
}
