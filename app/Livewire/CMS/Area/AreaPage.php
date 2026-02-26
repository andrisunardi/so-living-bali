<?php

namespace App\Livewire\CMS\Area;

use App\Exports\AreaExport;
use App\Livewire\Component;
use App\Models\Area;
use App\Services\AreaService;
use App\Services\DistrictService;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Url;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class AreaPage extends Component
{
    #[Url(except: '')]
    public string $search = '';

    #[Url(except: '')]
    public string $district_id = '';

    #[Url(except: [])]
    public array $is_show = [];

    #[Url(except: [])]
    public array $is_active = [];

    public function resetFilter(): void
    {
        $this->resetPage();

        $this->reset([
            'search',
            'district_id',
            'is_show',
            'is_active',
        ]);
    }

    public function updating(): void
    {
        $this->resetPage();
    }

    public function changeShow(Area $area): void
    {
        (new AreaService)->show(area: $area);

        $this->alertSuccess(
            title: trans('index.change_show').' '.trans('index.success'),
            body: trans('page.area').' '.trans('message.has_been_successfully_changed')
        );
    }

    public function changeActive(Area $area): void
    {
        (new AreaService)->active(area: $area);

        $this->alertSuccess(
            title: trans('index.change_active').' '.trans('index.success'),
            body: trans('page.area').' '.trans('message.has_been_successfully_changed')
        );
    }

    public function delete(Area $area): void
    {
        (new AreaService)->delete(area: $area);

        $this->alertSuccess(
            title: trans('index.delete').' '.trans('index.success'),
            body: trans('page.area').' '.trans('message.has_been_successfully_deleted')
        );
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

    public function getAreas(
        string $orderBy = 'id',
        string $sortBy = 'desc',
        bool $paginate = true,
    ): object {
        $areas = (new AreaService)->index(
            search: $this->search,
            districtId: $this->district_id,
            isShow: $this->is_show,
            isActive: $this->is_active,
            orderBy: $orderBy,
            sortBy: $sortBy,
            paginate: $paginate,
        );

        $areas->loadMissing(['district']);
        // $areas->loadCount(['areas', 'properties']);

        return $areas;
    }

    public function export(): BinaryFileResponse
    {
        $this->alertSuccess(
            title: trans('index.export').' '.trans('index.success'),
            body: trans('page.area').' '.trans('message.has_been_successfully_exported')
        );

        return Excel::download(new AreaExport(
            isShow: $this->is_show,
            isActive: $this->is_active,
            areas: $this->getAreas(orderBy: 'id', sortBy: 'asc', paginate: false),
        ), trans('page.area').'.xlsx');
    }

    public function render(): View
    {
        return view('livewire.cms.area.index', [
            'districts' => $this->getDistricts(),
            'areas' => $this->getAreas(),
        ]);
    }
}
