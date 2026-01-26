<?php

namespace App\Livewire\Layouts;

use App\Livewire\Component;
use Illuminate\Contracts\View\View;

class Hero extends Component
{
    public ?string $title = '';

    public ?string $subTitle = '';

    public ?string $description = '';

    public ?string $buttonName = '';

    public ?string $buttonLink = '';

    public bool $isExternalLink = false;

    public ?string $videoMobile = '';

    public ?string $videoDesktop = '';

    public function render(): View
    {
        return view('livewire.layouts.hero');
    }
}
