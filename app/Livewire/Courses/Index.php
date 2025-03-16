<?php

namespace App\Livewire\Courses;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Course;

class Index extends Component
{
    use WithPagination;

    public $search = ''; // Biến lưu giá trị tìm kiếm

    protected $queryString = ['search']; // Giữ trạng thái query khi phân trang

    public function updatingSearch()
    {
        $this->resetPage(); // Reset về trang đầu khi thay đổi từ khóa tìm kiếm
    }

    public function render()
    {
        $courses = Course::withCount(['students', 'feedbacks', 'materials'])
            ->where('course_name', 'like', '%' . $this->search . '%') // Lọc theo tên khóa học
            ->latest()
            ->paginate(6);

        return view('livewire.courses.index', [
            'courses' => $courses,
        ]);
    }
}
