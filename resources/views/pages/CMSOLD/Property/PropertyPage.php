<?php

namespace App\Livewire\CMS\Property;

use App\Enums\Property\PropertyStatus;
use App\Exports\PropertyExport;
use App\Livewire\Component;
use App\Models\Property;
use App\Services\PropertyService;
use App\Services\UserService;
use Illuminate\Contracts\View\View;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Url;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class PropertyPage extends Component
{
    #[Url(except: '')]
    public string $search = '';

    #[Url(except: '')]
    public string $user_id = '';

    #[Url(except: '')]
    public string $status = '';

    #[Url(except: '')]
    public string $start_date = '';

    #[Url(except: '')]
    public string $end_date = '';

    public function resetFilter(): void
    {
        $this->resetPage();

        $this->reset([
            'search',
            'user_id',
            'status',
            'start_date',
            'end_date',
        ]);
    }

    public function updating(): void
    {
        $this->resetPage();
    }

    public function delete(Property $property): void
    {
        (new PropertyService)->delete(property: $property);

        LivewireAlert::title(trans('index.delete').' '.trans('index.success'))
            ->html(trans('page.property').' '.trans('message.has_been_successfully_deleted'))
            ->withConfirmButton('OK')
            ->confirmButtonColor('#198754')
            ->success()
            ->show();
    }

    public function getUsers(): object
    {
        return (new UserService)->index(
            roleName: 'Agent',
            isActive: [true],
            orderBy: 'name',
            sortBy: 'asc',
            paginate: false,
        );
    }

    public function getPropertyStatuses(): array
    {
        return PropertyStatus::cases();
    }

    public function getProperties(bool $paginate = true): object
    {
        $properties = (new PropertyService)->index(
            search: $this->search,
            userId: $this->user_id,
            status: $this->status,
            startDate: $this->start_date,
            endDate: $this->end_date,
            paginate: $paginate,
        );

        $properties->loadMissing(['user']);

        return $properties;
    }

    public function export(): BinaryFileResponse
    {
        LivewireAlert::title(trans('index.export').' '.trans('index.success'))
            ->html(trans('page.property').' '.trans('message.has_been_successfully_exported'))
            ->withConfirmButton('OK')
            ->confirmButtonColor('#198754')
            ->success()
            ->show();

        return Excel::download(new PropertyExport(
            properties: $this->getProperties(paginate: false),
        ), trans('page.property').'.xlsx');
    }

    public function render(): View
    {
        return view('livewire.cms.property.index', [
            'users' => $this->getUsers(),
            'propertyStatuses' => $this->getPropertyStatuses(),
            'properties' => $this->getProperties(),
        ]);
    }
}
