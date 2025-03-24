<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.custom')] 
class CustomPage extends Component
{
    public function render()
    {
        return view('livewire.custom-page') 
        ->layout('components.layouts.custom'); ;
    }
}
