<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class ForgotPassword extends Component
{
    public $email;
    public $isLoading = false;

    public function sendResetLink()
    {
        $this->validate([
            'email' => 'required|email|exists:students,email'
        ], [
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không hợp lệ',
            'email.exists' => 'Email không tồn tại trong hệ thống'
        ]);

        $this->isLoading = true;

        $token = Str::random(64);
        $student = Student::where('email', $this->email)->first();

        // Lưu token vào database
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $this->email],
            [
                'token' => $token,
                'created_at' => now()
            ]
        );

        // Gửi email
        Mail::send('emails.forgot-password', [
            'token' => $token,
            'student' => $student
        ], function($message) {
            $message->to($this->email)
                   ->subject('Đặt lại mật khẩu - ' . config('app.name'));
        });

        session()->flash('message', 'Link đặt lại mật khẩu đã được gửi đến email của bạn!');
        $this->email = '';
        $this->isLoading = false;
    }

    public function render()
    {
        return view('livewire.forgot-password');
    }
} 