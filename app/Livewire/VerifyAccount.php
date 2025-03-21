<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Student;
use Illuminate\Support\Facades\Request;

class VerifyAccount extends Component
{
    public $email, $code_input;

    public function mount()
    {
        $this->email = request()->query('email', '');
        $this->code_input = request()->query('code', '');
        
        // Nếu có cả email và code, tự động xác thực
        if ($this->email && $this->code_input) {
            $this->verify();
        }
    }

    public function verify()
    {
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
            session()->flash('error', 'Mã xác thực không đúng.');
        }
    }

    public function render()
    {
        return view('livewire.verify-account');
    }
}
