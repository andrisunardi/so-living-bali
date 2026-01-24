<?php

namespace App\Livewire\Layouts;

use App\Livewire\Component;
use Illuminate\Contracts\View\View;

class Header extends Component
{
    public function render(): View
    {
        return view('livewire.layouts.header');
    }
}
