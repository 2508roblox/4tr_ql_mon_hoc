<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course;
use Livewire\WithPagination;

class Search extends Component
{
    use WithPagination;

    public $search = '';
    public $showResults = false;

    public function updatedSearch()
    {
        $this->showResults = true;
    }

    public function render()
    {
        $courses = [];
        if ($this->search) {
            $courses = Course::where('course_name', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%')
                ->take(5)
                ->get();
        }

        return view('livewire.search', [
            'courses' => $courses
        ]);
    }

    public function selectCourse($slug)
    {
        return redirect()->route('courses.show', $slug);
    }
} 