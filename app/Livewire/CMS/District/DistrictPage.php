<?php

namespace App\Livewire\CMS\District;

use App\Exports\DistrictExport;
use App\Livewire\Component;
use App\Models\District;
use App\Services\DistrictService;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Url;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DistrictPage extends Component
{
    #[Url(except: '')]
    public string $search = '';

    #[Url(except: [])]
    public array $is_show = [];

    #[Url(except: [])]
    public array $is_active = [];

    public function resetFilter(): void
    {
        $this->resetPage();

        $this->reset([
            'search',
            'is_show',
            'is_active',
        ]);
    }

    public function updating(): void
    {
        $this->resetPage();
    }

    public function changeShow(District $district): void
    {
        (new DistrictService)->show(district: $district);

        $this->alertSuccess(
            title: trans('index.change_show').' '.trans('index.success'),
            body: trans('page.district').' '.trans('message.has_been_successfully_changed')
        );
    }

    public function changeActive(District $district): void
    {
        (new DistrictService)->active(district: $district);

        $this->alertSuccess(
            title: trans('index.change_active').' '.trans('index.success'),
            body: trans('page.district').' '.trans('message.has_been_successfully_changed')
        );
    }

    public function delete(District $district): void
    {
        (new DistrictService)->delete(district: $district);

        $this->alertSuccess(
            title: trans('index.delete').' '.trans('index.success'),
            body: trans('page.district').' '.trans('message.has_been_successfully_deleted')
        );
    }

    public function getDistricts(bool $paginate = true): object
    {
        $districts = (new DistrictService)->index(
            search: $this->search,
            isShow: $this->is_show,
            isActive: $this->is_active,
            paginate: $paginate,
        );

        // $districts->loadCount(['areas', 'properties']);

        return $districts;
    }

    public function export(): BinaryFileResponse
    {
        $this->alertSuccess(
            title: trans('index.export').' '.trans('index.success'),
            body: trans('page.district').' '.trans('message.has_been_successfully_exported')
        );

        return Excel::download(new DistrictExport(
            isShow: $this->is_show,
            isActive: $this->is_active,
            districts: $this->getDistricts(paginate: false),
        ), trans('page.district').'.xlsx');
    }

    public function render(): View
    {
        return view('livewire.cms.district.index', [
            'districts' => $this->getDistricts(),
        ]);
    }
}
