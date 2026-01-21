<?php

namespace App\Livewire\Modal;

use App\Livewire\Component;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;

class ModalTheme extends Component
{
    #[On('openModalTheme')]
    public function mount(): void {}

    public function render(): View
    {
        return view('livewire.modal.theme');
    }
}
