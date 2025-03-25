<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

#[Layout('components.layouts.custom')] 
class CustomPage extends Component
{
    public $courses;
    public $student;

    public function mount()
    {
        // Lấy danh sách 9 khóa học mới nhất kèm số lượng học sinh và số lượng đánh giá
        $this->courses = Course::withCount(['enrollments', 'feedbacks'])
            ->latest()
            ->take(9)
            ->get();
            
        // Lấy thông tin sinh viên đang đăng nhập
        $this->student = Auth::guard('student')->user();
    }

    public function logout()
    {
        Auth::guard('student')->logout();
        Session::flush(); // Xóa toàn bộ session
        return redirect()->route('auth'); // Điều hướng về trang chủ
    }

    public function render()
    {
        return view('livewire.home');
    }
}
