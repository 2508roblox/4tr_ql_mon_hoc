<?php

namespace App\Livewire\Courses;

use Livewire\Component;
use App\Models\Course;

class Show extends Component
{
    public $course;
    public $feedbacks;
    public $lessons;
    public $relatedCourses;

    public function mount($slug) // Nhận slug thay vì model
    {
        // Lấy khóa học theo slug
        $this->course = Course::where('slug', $slug)
            ->with(['creator', 'students', 'feedbacks', 'materials'])
            ->firstOrFail(); // Nếu không tìm thấy, trả về 404

        // Lấy danh sách feedback của khóa học
        $this->feedbacks = $this->course->feedbacks()->latest()->get();

        // Lấy danh sách bài học (materials)
        $this->lessons = $this->course->materials()->latest()->get();

        // Lấy 3 khóa học ngẫu nhiên khác (ngoại trừ khóa học hiện tại)
        $this->relatedCourses = Course::where('id', '!=', $this->course->id)
            ->inRandomOrder()
            ->limit(3)
            ->get();
    }

    public function render()
    {
        return view('livewire.courses.show', [
            'course' => $this->course,
            'feedbacks' => $this->feedbacks,
            'lessons' => $this->lessons,
            'relatedCourses' => $this->relatedCourses,
        ]);
    }
}
