<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Student;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class VerifyAccount extends Component
{
    public $email;
    public $code_input;
    public $verification_code;
    public $showError = false;
    public $errorMessage = '';

    public function mount()
    {
        $this->email = request()->query('email', '');
    }

    public function verify()
    {
        $this->validate([
            'code_input' => 'required|size:6'
        ]);

        $student = Student::where('email', $this->email)
            ->where('verification_code', $this->code_input)
            ->first();

        if ($student) {
            $student->update([
                'email_verified_at' => now(),
                'verification_code' => null
            ]);
            session()->flash('message', 'Xác thực thành công! Bạn có thể đăng nhập.');
            return redirect()->route('auth');
        } else {
            $this->showError = true;
            $this->errorMessage = 'Mã xác thực không đúng.';
        }
    }

    public function resendCode()
    {
        $student = Student::where('email', $this->email)->first();
        
        if ($student) {
            $newCode = Str::random(6);
            $student->update(['verification_code' => $newCode]);

            Mail::send('emails.verify-email', [
                'user' => $student,
                'verification_code' => $newCode
            ], function ($message) {
                $message->to($this->email)
                       ->subject('Mã xác thực mới - ' . config('app.name'));
            });

            session()->flash('message', 'Mã xác thực mới đã được gửi đến email của bạn.');
        }
    }

    public function render()
    {
        return view('livewire.verify-account');
    }
}
