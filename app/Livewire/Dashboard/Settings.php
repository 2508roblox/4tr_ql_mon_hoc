<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;

class Settings extends Component
{
    use WithFileUploads;

    public $student;
    public $full_name;
    public $student_id;
    public $current_password;
    public $new_password;
    public $confirm_password;
    public $avatar;
    public $email;
    public $phone;
    public $address;
    public $birthday;

    public function mount()
    {
        $this->student = Auth::guard('student')->user();
        $this->full_name = $this->student->full_name;
        $this->student_id = $this->student->student_id;
        $this->email = $this->student->email;
        $this->phone = $this->student->phone;
        $this->address = $this->student->address;
        $this->birthday = $this->student->birthday;
    }

    public function updateProfile()
    {
        $this->validate([
            'full_name' => 'required|min:3',
            'student_id' => 'required|min:3',
        ]);

        $this->student->update([
            'full_name' => $this->full_name,
            'student_id' => $this->student_id,
        ]);

        if ($this->avatar) {
            $this->validate([
                'avatar' => 'image|max:1024'
            ]);
            
            $path = $this->avatar->store('avatars', 'public');
            $this->student->update(['avatar' => $path]);
        }

        session()->flash('message', 'Cập nhật thông tin thành công!');
    }

    public function updatePassword()
    {
        $this->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
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

        session()->flash('message', 'Cập nhật mật khẩu thành công!');
    }

    public function render()
    {
        return view('livewire.dashboard.settings');
    }
}
