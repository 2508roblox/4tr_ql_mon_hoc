<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

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
        $student = Auth::guard('student')->user();
        return view('livewire.home', [
            'courses' => $this->courses,
            'student' => $student,
        ]);
    }
}
