<?php

namespace App\Livewire\Dashboard;

use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class StudentSidebar extends Component
{
    public $student;

    public function mount()
    {
        $this->student = Auth::guard('student')->user();
    }

    public function logout()
    {
        Auth::guard('student')->logout();
        return redirect()->route('student.login');
    }

    public function render()
    {
        return view('livewire.dashboard.student-sidebar');
    }
}