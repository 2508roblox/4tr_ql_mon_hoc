<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class StudentInfo extends Component
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
        $this->totalCourses = $this->student->enrollments()->count();
        $this->totalLessons = $this->student->learningHistories()->where('is_completed', true)->count();
        $this->totalAttendance = $this->student->attendances()->where('status', 'present')->count();
    }

    public function render()
    {
        return view('livewire.dashboard.student-info');
    }
} 