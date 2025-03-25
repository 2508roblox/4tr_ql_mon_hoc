<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Header extends Component
{
    public function logout()
    {
        Auth::guard('student')->logout();
        Session::flush(); // Xóa toàn bộ session
        return redirect()->route('auth'); // Điều hướng về trang chủ hoặc trang login
    }

    public function render()
    {
        $student = Auth::guard('student')->user();
        return view('livewire.header', compact('student'));
    }
    
}
