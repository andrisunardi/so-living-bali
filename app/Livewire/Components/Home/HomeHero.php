<?php

namespace App\Livewire\Components\Home;

use App\Livewire\Component;
use Illuminate\Contracts\View\View;

class HomeHero extends Component
{
    public ?string $title = '';

    public ?string $description = '';

    public ?string $image = '';

    public function render(): View
    {
        return view('livewire.components.home.hero');
    }
}
