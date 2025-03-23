<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Profile extends Component
{
    public $student;
    public $current_password;
    public $new_password;
    public $confirm_password;

    public function mount()
    {
        $this->student = Auth::guard('student')->user();
    }

    public function updatePassword()
    {
        $this->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ], [
            'current_password.required' => 'Vui lòng nhập mật khẩu hiện tại',
            'new_password.required' => 'Vui lòng nhập mật khẩu mới',
            'new_password.min' => 'Mật khẩu mới phải có ít nhất 6 ký tự',
            'confirm_password.required' => 'Vui lòng xác nhận mật khẩu mới',
            'confirm_password.same' => 'Mật khẩu xác nhận không khớp với mật khẩu mới'
        ]);

        if (!Hash::check($this->current_password, $this->student->password)) {
            $this->addError('current_password', 'Mật khẩu hiện tại không chính xác.');
            return;
        }

        $this->student->update([
            'password' => Hash::make($this->new_password)
        ]);

        $this->current_password = '';
        $this->new_password = '';
        $this->confirm_password = '';

        session()->flash('message', 'Cập nhật mật khẩu thành công! Vui lòng đăng nhập lại.');
        
        // Đăng xuất sau khi đổi mật khẩu
        Auth::guard('student')->logout();
        return redirect()->route('auth');
    }

    public function render()
    {
        return view('livewire.dashboard.profile');
    }
}
