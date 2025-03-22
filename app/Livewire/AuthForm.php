<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthForm extends Component
{
    public $isRegisterLoading = false;
    public $isLoginLoading = false;

    public $email, $password, $full_name, $student_id, $verification_code, $code_input;
    public $login_email, $login_password, $remember_me = false;

    public function register()
    {
        $this->isRegisterLoading = true;
        $this->validate([
            'email' => 'required|email|unique:students,email',
            'password' => 'required|min:8',
            'full_name' => 'required',
            'student_id' => 'required|unique:students,student_id',
        ]);

        $this->verification_code = Str::random(6);

        $student = Student::create([
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'full_name' => $this->full_name,
            'student_id' => $this->student_id,
            'verification_code' => $this->verification_code,
        ]);

        // Gửi email sử dụng template mới
        Mail::send('emails.verify-email', [
            'user' => $student,
            'verification_code' => $this->verification_code
        ], function ($message) {
            $message->to($this->email)
                   ->subject('Xác thực tài khoản - ' . config('app.name'));
        });

        $this->isRegisterLoading = false;
        return redirect()->route('verify', ['email' => $this->email]);
    }

    public function login()
    {
        $this->isLoginLoading = true;
        $this->validate([
            'login_email' => 'required|email',
            'login_password' => 'required|min:8',
        ]);

        $student = Student::where('email', $this->login_email)->first();

        if (!$student || !Hash::check($this->login_password, $student->password)) {
            session()->flash('error', 'Email hoặc mật khẩu không đúng.');
            $this->isLoginLoading = false;
            return;
        }

        if (!$student->email_verified_at) {
            // Nếu chưa có mã xác minh, tạo mới
            if (!$student->verification_code) {
                $student->verification_code = Str::random(6);
                $student->save();
            }
    
            // Gửi email chứa mã xác minh (không gửi URL)
            Mail::send('emails.verify-email', [
                'user' => $student,
                'verification_code' => $student->verification_code
            ], function ($message) {
                $message->to($this->login_email)
                       ->subject('Mã xác minh tài khoản - ' . config('app.name'));
            });
    
            $this->isLoginLoading = false;
            session()->flash('message', 'Mã xác minh đã được gửi đến email của bạn.');
            return redirect()->route('verify', ['email' => $this->login_email]);
        }
    

        Auth::guard('student')->attempt(['email' => $this->login_email, 'password' => $this->login_password], $this->remember_me);

        session()->flash('message', 'Đăng nhập thành công!');
        $this->isLoginLoading = false;
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.auth-form');
    }
}
