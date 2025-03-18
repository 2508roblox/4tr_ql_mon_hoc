<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Profile extends Component
{
    public $student;

    public function mount()
    {
        $this->student = Auth::guard('student')->user();
    }

    public function render()
    {
        return view('livewire.dashboard.profile');
    }
}
