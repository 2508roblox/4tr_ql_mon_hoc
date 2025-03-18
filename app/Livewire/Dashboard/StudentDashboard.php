<?php

namespace App\Livewire\Dashboard;

use App\Models\Student;
use App\Models\Enrollment;
use App\Models\StudentLearningHistory;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class StudentDashboard extends Component
{
    public $student;
    public $totalCourses;
    public $totalLessons;
    public $totalAttendance;

    public function mount()
    {
        $this->student = Auth::guard('student')->user();
        $this->loadStatistics();
    }

    public function loadStatistics()
    {
        // Tổng số khóa học đã tham gia
        $this->totalCourses = Enrollment::where('student_id', $this->student->id)->count();

        // Tổng số bài học đã học
        $this->totalLessons = StudentLearningHistory::where('student_id', $this->student->id)
            ->where('is_completed', true)
            ->count();

        // Tổng số lần điểm danh
        $this->totalAttendance = Attendance::where('student_id', $this->student->id)
            ->where('status', 'present')
            ->count();
    }

    public function render()
    {
        return view('livewire.dashboard.student-dashboard', [
            'student' => $this->student,
            'totalCourses' => $this->totalCourses,
            'totalLessons' => $this->totalLessons,
            'totalAttendance' => $this->totalAttendance
        ]);
    }
}
