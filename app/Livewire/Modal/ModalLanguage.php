<?php

namespace App\Livewire\Modal;

use App\Livewire\Component;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;

class ModalLanguage extends Component
{
    #[On('openModalLanguage')]
    public function mount(): void {}

    public function getLanguages(): object
    {
        return collect([
            ['id' => 1, 'code' => 'en', 'name' => 'English'],
            ['id' => 2, 'code' => 'id', 'name' => 'Indonesia'],
            ['id' => 3, 'code' => 'ban', 'name' => 'Bali'],
            ['id' => 4, 'code' => 'zh', 'name' => 'Chinese'],
            ['id' => 5, 'code' => 'ja', 'name' => 'Japan'],
            ['id' => 6, 'code' => 'kr', 'name' => 'Korea'],
            ['id' => 7, 'code' => 'nl', 'name' => 'Dutch'],
            ['id' => 8, 'code' => 'fr', 'name' => 'France'],
            ['id' => 9, 'code' => 'de', 'name' => 'Jerman'],
            ['id' => 10, 'code' => 'es', 'name' => 'Spanyol'],
            ['id' => 11, 'code' => 'ru', 'name' => 'Rusia'],
            ['id' => 12, 'code' => 'ar', 'name' => 'Arab'],
        ]);
    }

    public function render(): View
    {
        return view('livewire.modal.language', [
            'languages' => $this->getLanguages(),
        ]);
    }
}
