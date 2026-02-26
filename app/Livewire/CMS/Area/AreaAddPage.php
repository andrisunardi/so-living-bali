<?php

namespace App\Livewire\CMS\Area;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\Area\AreaAddForm;
use App\Services\DistrictService;
use Illuminate\Contracts\View\View;

class AreaAddPage extends Component
{
    public AreaAddForm $form;

    public function resetFields(): void
    {
        $this->form->reset();
    }

    public function submit(): void
    {
        $this->form->submit();

        session()->flash('success', [
            'title' => trans('index.add').' '.trans('index.success'),
            'message' => trans('page.area').' '.trans('message.has_been_successfully_added'),
        ]);

        $this->redirect(route('cms.area.index'), navigate: true);
    }

    public function getDistricts(): object
    {
        return (new DistrictService)->index(
            isActive: [true],
            orderBy: 'name',
            sortBy: 'asc',
            paginate: false,
        );
    }

    public function render(): View
    {
        return view('livewire.cms.area.add', [
            'districts' => $this->getDistricts(),
        ]);
    }
}
