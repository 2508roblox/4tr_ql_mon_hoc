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
    public $showAttendanceModal = false;
    public $currentWeek = 1;
    public $courseStartDate;

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

        // Tính tuần hiện tại và làm tròn
        $this->courseStartDate = \Carbon\Carbon::parse($this->course->created_at);
        $currentDate = \Carbon\Carbon::now();
        $this->currentWeek = ceil($this->courseStartDate->diffInWeeks($currentDate) );
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
        $allCompleted = true;

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

            // Kiểm tra nếu có bài học chưa hoàn thành
            if ($completedCount < $totalResources) {
                $allCompleted = false;
            }
        }

        // Kiểm tra xem học viên đã điểm danh tuần này chưa
        $hasAttended = \App\Models\Attendance::where('student_id', $studentId)
            ->where('course_id', $this->course->id)
            ->where('week', $this->currentWeek)
            ->where('status', 1)
            ->exists();

        // Chỉ hiển thị modal nếu tất cả bài học đã hoàn thành và chưa điểm danh
        if ($allCompleted && !$hasAttended) {
            $this->showAttendanceModal = true;
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

    public function markAttendance()
    {
        if (!Auth::guard('student')->check()) {
            return;
        }

        // Tạo hoặc cập nhật điểm danh
        $attendance = \App\Models\Attendance::updateOrCreate(
            [
                'student_id' => Auth::guard('student')->id(),
                'course_id' => $this->course->id,
                'week' => $this->currentWeek,
            ],
            [
                'status' => 1,
                'date' => now(),
            ]
        );

        $this->showAttendanceModal = false;
        $this->dispatch('notify', [
            'type' => 'success',
            'message' => 'Điểm danh thành công!'
        ]);
    }

    public function render()
    {
        return view('livewire.lessons.show', [
            'lesson' => $this->lesson,
            'course' => $this->course,
            'lessons' => $this->lessons,
            'currentResource' => $this->currentResource,
            'completedResourcesCount' => $this->completedResourcesCount,
            'showAttendanceModal' => $this->showAttendanceModal,
            'currentWeek' => $this->currentWeek
        ]);
    }
}
