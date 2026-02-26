<?php

namespace App\Livewire\CMS\Area;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\Area\AreaEditForm;
use App\Models\Area;
use App\Services\DistrictService;
use Illuminate\Contracts\View\View;

class AreaEditPage extends Component
{
    public AreaEditForm $form;

    public Area $area;

    public function mount(Area $area): void
    {
        $this->area = $area;
        $this->form->set(area: $area);
    }

    public function resetFields(): void
    {
        $this->form->set(area: $this->area);
    }

    public function submit(): void
    {
        $this->form->submit(area: $this->area);

        session()->flash('success', [
            'title' => trans('index.edit').' '.trans('index.success'),
            'message' => trans('page.area').' '.trans('message.has_been_successfully_edited'),
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
        return view('livewire.cms.area.edit', [
            'districts' => $this->getDistricts(),
        ]);
    }
}
