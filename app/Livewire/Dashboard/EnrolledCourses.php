<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class EnrolledCourses extends Component
{
    public $student;
    public $enrolledCourses;
    public $completedCourses;
    public $activeCourses;
    public $availableCourses;

    public function mount()
    {
        $this->student = Auth::guard('student')->user();
        $this->loadCourses();
        $this->loadAvailableCourses();
    }

    public function loadCourses()
    {
        // Lấy danh sách khóa học đã đăng ký với status = 1
        $this->enrolledCourses = $this->student->courses()
            ->wherePivot('status', 1)
            ->with(['materials', 'materials.lessonResources'])
            ->get();

        // Lấy danh sách khóa học đã hoàn thành (tiến độ 100%)
        $this->completedCourses = $this->enrolledCourses->filter(function ($course) {
            return $this->getCourseProgress($course) == 100;
        });
        // Lấy danh sách khóa học đang học (tiến độ < 100%)
        $this->activeCourses = $this->enrolledCourses->filter(function ($course) {
            return $this->getCourseProgress($course) < 100;
        });
    }

    public function loadAvailableCourses()
    {
        // Lấy tất cả khóa học
        $allCourses = \App\Models\Course::with(['materials', 'materials.lessonResources'])->get();
        
        // Lọc ra các khóa học chưa đăng ký hoặc có status = 0
        $this->availableCourses = $allCourses->filter(function ($course) {
            $enrollment = $this->student->enrollments()->where('course_id', $course->id)->first();
            return !$enrollment || $enrollment->status == 0;
        });
    }

    public function enrollCourse($courseId)
    {
        // Kiểm tra xem đã có enrollment chưa
        $enrollment = $this->student->enrollments()->where('course_id', $courseId)->first();
        
        if (!$enrollment) {
            // Tạo enrollment mới với status = 0 (chờ duyệt)
            $this->student->enrollments()->create([
                'course_id' => $courseId,
                'status' => 0
            ]);
        } else {
            // Cập nhật status của enrollment thành 0 (chờ duyệt)
            $enrollment->update(['status' => 0]);
        }
        
        session()->flash('message', 'Đăng ký môn học thành công! Vui lòng đợi giảng viên duyệt.');
        session()->flash('active_tab', 'register-4');
        
        return redirect()->route('dashboard.enrolled-courses');
    }

    public function getCourseProgress($course)
    {
        $totalMaterials = $course->materials->count();
        if ($totalMaterials === 0) return 0;

        $completedMaterials = 0;
        
        foreach ($course->materials as $material) {
            $totalResources = $material->lessonResources->count();
            if ($totalResources === 0) continue;

            $completedResources = $this->student->learningHistories()
                ->whereHas('lessonResource', function ($query) use ($material) {
                    $query->where('material_id', $material->id);
                })
                ->where('is_completed', true)
                ->count();

            // Nếu tất cả lessonResource của material đã hoàn thành thì tính là 1 bài đã hoàn thành
            if ($completedResources === $totalResources) {
                $completedMaterials++;
            }
        }

        return min(round(($completedMaterials / $totalMaterials) * 100), 100);
    }

    public function render()
    {
        return view('livewire.dashboard.enrolled-courses');
    }
}
