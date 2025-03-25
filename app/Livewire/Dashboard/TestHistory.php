<?php

namespace App\Livewire\Dashboard;

use App\Models\StudentTest;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class TestHistory extends Component
{
    use WithPagination;

    public function render()
    {
        $tests = StudentTest::where('student_id', Auth::guard('student')->id())
            ->with(['course'])
            ->orderBy('submitted_at', 'desc')
            ->paginate(5);

        return view('livewire.dashboard.test-history', [
            'tests' => $tests
        ]);
    }
}
