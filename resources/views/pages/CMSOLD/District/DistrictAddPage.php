<?php

namespace App\Livewire\CMS\District;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\District\DistrictAddForm;
use Illuminate\Contracts\View\View;

class DistrictAddPage extends Component
{
    public DistrictAddForm $form;

    public function resetFields(): void
    {
        $this->form->reset();
    }

    public function submit(): void
    {
        $this->form->submit();

        session()->flash('success', [
            'title' => trans('index.add').' '.trans('index.success'),
            'message' => trans('page.district').' '.trans('message.has_been_successfully_added'),
        ]);

        $this->redirect(route('cms.district.index'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.cms.district.add');
    }
}
