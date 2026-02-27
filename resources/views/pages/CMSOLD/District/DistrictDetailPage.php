<?php

namespace App\Livewire\CMS\District;

use App\Livewire\Component;
use App\Models\District;
use App\Services\DistrictService;
use Illuminate\Contracts\View\View;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class DistrictDetailPage extends Component
{
    public District $district;

    public function mount(District $district): void
    {
        $this->district = $district;
    }

    public function changeShow(): void
    {
        (new DistrictService)->show(district: $this->district);

        // $this->district->loadCount(['areas', 'properties']);

        LivewireAlert::title(trans('index.change_show').' '.trans('index.success'))
            ->html(trans('page.district').' '.trans('message.has_been_successfully_changed'))
            ->withConfirmButton('OK')
            ->confirmButtonColor('#198754')
            ->success()
            ->show();
    }

    public function changeActive(): void
    {
        (new DistrictService)->active(district: $this->district);

        // $this->district->loadCount(['areas', 'properties']);

        LivewireAlert::title(trans('index.change_active').' '.trans('index.success'))
            ->html(trans('page.district').' '.trans('message.has_been_successfully_changed'))
            ->withConfirmButton('OK')
            ->confirmButtonColor('#198754')
            ->success()
            ->show();
    }

    public function delete(): void
    {
        (new DistrictService)->delete(district: $this->district);

        session()->flash('success', [
            'title' => trans('index.delete').' '.trans('index.success'),
            'message' => trans('page.district').' '.trans('message.has_been_successfully_deleted'),
        ]);

        $this->redirect(route('cms.district.index'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.cms.district.detail');
    }
}
