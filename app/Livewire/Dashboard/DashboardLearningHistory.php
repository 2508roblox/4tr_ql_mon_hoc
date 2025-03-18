<?php

namespace App\Livewire\Dashboard;

use App\Models\StudentLearningHistory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class DashboardLearningHistory extends Component
{
    use WithPagination;

    public $searchQuery = '';
    public $filterStatus = 'all';
    public $filterDate = '';

    public function updatingSearchQuery()
    {
        $this->resetPage();
    }

    public function updatingFilterStatus()
    {
        $this->resetPage();
    }

    public function updatingFilterDate()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = StudentLearningHistory::with(['lessonResource.material.course'])
            ->where('student_id', Auth::guard('student')->id());

        // Lọc theo trạng thái
        if ($this->filterStatus !== 'all') {
            $query->where('is_completed', $this->filterStatus === 'completed');
        }

        // Lọc theo ngày
        if ($this->filterDate) {
            $query->whereDate('created_at', $this->filterDate);
        }

        // Tìm kiếm
        if ($this->searchQuery) {
            $query->whereHas('lessonResource.material.course', function ($q) {
                $q->where('course_name', 'like', '%' . $this->searchQuery . '%')
                    ->orWhere('title', 'like', '%' . $this->searchQuery . '%')
                    ->orWhere('name', 'like', '%' . $this->searchQuery . '%');
            });
        }

        $histories = $query->latest()->paginate(10);

        return view('livewire.dashboard.dashboard-learning-history', [
            'histories' => $histories
        ]);
    }

    public function clearFilters()
    {
        $this->searchQuery = '';
        $this->filterStatus = 'all';
        $this->filterDate = '';
        $this->resetPage();
    }
} 