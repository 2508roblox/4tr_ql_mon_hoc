<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course;

class Home extends Component
{
    public $courses;
    public function mount()
    {
        // Lấy danh sách 9 khóa học mới nhất kèm số lượng học sinh và số lượng đánh giá
        $this->courses = Course::withCount(['enrollments', 'feedbacks'])
            ->latest()
            ->take(9)
            ->get();
    }

    public function render()
    {
        return view('livewire.home', [
            'courses' => $this->courses,
        ]);
    }
}
