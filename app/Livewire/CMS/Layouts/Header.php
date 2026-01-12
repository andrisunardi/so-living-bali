<?php

namespace App\Livewire\CMS\Layouts;

use App\Livewire\Component;
use Illuminate\Contracts\View\View;

class Header extends Component
{
    public function language(): void
    {
        $this->dispatch('openModalLanguage');
    }

    public function theme(): void
    {
        $this->dispatch('openModalTheme');
    }

    public function account(): void
    {
        $this->dispatch('openModalAccount');
    }

    public function render(): View
    {
        return view('livewire.cms.layouts.header');
    }
}
