<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Feedback;
use App\Models\Course;

class Reviews extends Component
{
    public $reviews;

    public function mount()
    {
        $this->reviews = Feedback::with('course')->get();
    }

    public function deleteReview($id)
    {
        $review = Feedback::find($id);
        if ($review) {
            $review->delete();
            $this->reviews = Feedback::with('course')->get();
        }
    }

    public function render()
    {
        return view('livewire.dashboard.reviews');
    }
}
