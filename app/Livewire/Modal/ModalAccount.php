<?php

namespace App\Livewire\Modal;

use App\Livewire\Component;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;

class ModalAccount extends Component
{
    #[On('openModalAccount')]
    public function mount(): void {}

    public function render(): View
    {
        return view('livewire.modal.account');
    }
}
