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

    public function mount()
    {
        $this->student = Auth::guard('student')->user();
        $this->loadCourses();
    }

    public function loadCourses()
    {
        // Lấy danh sách khóa học đã đăng ký
        $this->enrolledCourses = $this->student->courses()
            ->with(['materials', 'materials.lessonResources'])
            ->get();

        // Lấy danh sách khóa học đã hoàn thành
        $this->completedCourses = $this->enrolledCourses->filter(function ($course) {
            $totalMaterials = $course->materials->count();
            $completedMaterials = $this->student->learningHistories()
                ->whereHas('lessonResource.material', function ($query) use ($course) {
                    $query->where('course_id', $course->id);
                })
                ->where('is_completed', true)
                ->count();
            
            return $totalMaterials > 0 && $totalMaterials === $completedMaterials;
        });

        // Lấy danh sách khóa học đang học
        $this->activeCourses = $this->enrolledCourses->filter(function ($course) {
            return !$this->completedCourses->contains($course->id);
        });
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
