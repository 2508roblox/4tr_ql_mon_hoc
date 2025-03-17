<?php

namespace App\Livewire\Lessons;

use Livewire\Component;
use App\Models\Material;
use App\Models\Course;

class Show extends Component
{
    public $lesson;
    public $course;
    public $lessons;

    public function mount($lesson)
    {
        // Lấy thông tin bài học theo ID hoặc slug
        $this->lesson = Material::where('id', $lesson)->with('lessonResources')->firstOrFail();

        // Lấy thông tin khóa học của bài học này
        $this->course = $this->lesson->course()->with(['creator', 'feedbacks', 'materials'])->first();

        // Lấy danh sách tất cả bài học trong cùng khóa học (trừ bài học hiện tại)
        $this->lessons = $this->course->materials()->get();
    }

    public function render()
    {
        return view('livewire.lessons.show', [
            'lesson' => $this->lesson,
            'course' => $this->course,
            'lessons' => $this->lessons,
        ]);
    }
}
