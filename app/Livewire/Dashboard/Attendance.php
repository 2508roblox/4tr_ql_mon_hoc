<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Attendance as AttendanceModel;

class Attendance extends Component
{
    public $attendances;
    public $courses;

    public function mount()
    {
        // Lấy danh sách điểm danh của sinh viên với thông tin khóa học
        $this->attendances = AttendanceModel::where('student_id', Auth::guard('student')->id())
            ->with('course')
            ->orderBy('date', 'desc')
            ->get();
    }

    public function render()
    {
        return view('livewire.dashboard.attendance', [
            'attendances' => $this->attendances
        ]);
    }
}
