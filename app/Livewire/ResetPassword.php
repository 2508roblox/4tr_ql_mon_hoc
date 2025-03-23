<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ResetPassword extends Component
{
    public $token;
    public $email;
    public $password;
    public $password_confirmation;
    public $isLoading = false;

    public function mount($token)
    {
        $this->token = $token;
        $resetData = DB::table('password_reset_tokens')->where('token', $token)->first();
        
        if (!$resetData) {
            session()->flash('error', 'Link đặt lại mật khẩu không hợp lệ hoặc đã hết hạn.');
            return redirect()->route('forgot-password');
        }

        $this->email = $resetData->email;
    }

    public function resetPassword()
    {
        $this->validate([
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password'
        ], [
            'password.required' => 'Vui lòng nhập mật khẩu mới',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự',
            'password_confirmation.required' => 'Vui lòng xác nhận mật khẩu',
            'password_confirmation.same' => 'Mật khẩu xác nhận không khớp'
        ]);

        $this->isLoading = true;

        $student = Student::where('email', $this->email)->first();
        $student->update([
            'password' => Hash::make($this->password)
        ]);

        // Xóa token đã sử dụng
        DB::table('password_reset_tokens')->where('email', $this->email)->delete();

        session()->flash('message', 'Mật khẩu đã được đặt lại thành công! Vui lòng đăng nhập với mật khẩu mới.');
        $this->isLoading = false;
        return redirect()->route('auth');
    }

    public function render()
    {
        return view('livewire.reset-password');
    }
} 