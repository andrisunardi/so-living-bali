<?php

namespace App\Livewire\CMS\District;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\District\DistrictEditForm;
use App\Models\District;
use Illuminate\Contracts\View\View;

class DistrictEditPage extends Component
{
    public DistrictEditForm $form;

    public District $district;

    public function mount(District $district): void
    {
        $this->district = $district;
        $this->form->set(district: $district);
    }

    public function resetFields(): void
    {
        $this->form->set(district: $this->district);
    }

    public function submit(): void
    {
        $this->form->submit(district: $this->district);

        session()->flash('success', [
            'title' => trans('index.edit').' '.trans('index.success'),
            'message' => trans('page.district').' '.trans('message.has_been_successfully_edited'),
        ]);

        $this->redirect(route('cms.district.index'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.cms.district.edit');
    }
}
