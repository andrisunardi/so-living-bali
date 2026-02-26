<?php

namespace App\Livewire\CMS\Area;

use App\Livewire\Component;
use App\Models\Area;
use App\Services\AreaService;
use Illuminate\Contracts\View\View;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class AreaDetailPage extends Component
{
    public Area $area;

    public function mount(Area $area): void
    {
        $this->area = $area;
    }

    public function changeShow(): void
    {
        (new AreaService)->show(area: $this->area);

        // $this->area->loadCount(['areas', 'properties']);

        LivewireAlert::title(trans('index.change_show').' '.trans('index.success'))
            ->html(trans('page.area').' '.trans('message.has_been_successfully_changed'))
            ->withConfirmButton('OK')
            ->confirmButtonColor('#198754')
            ->success()
            ->show();
    }

    public function changeActive(): void
    {
        (new AreaService)->active(area: $this->area);

        // $this->area->loadCount(['areas', 'properties']);

        LivewireAlert::title(trans('index.change_active').' '.trans('index.success'))
            ->html(trans('page.area').' '.trans('message.has_been_successfully_changed'))
            ->withConfirmButton('OK')
            ->confirmButtonColor('#198754')
            ->success()
            ->show();
    }

    public function delete(): void
    {
        (new AreaService)->delete(area: $this->area);

        session()->flash('success', [
            'title' => trans('index.delete').' '.trans('index.success'),
            'message' => trans('page.area').' '.trans('message.has_been_successfully_deleted'),
        ]);

        $this->redirect(route('cms.area.index'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.cms.area.detail');
    }
}
