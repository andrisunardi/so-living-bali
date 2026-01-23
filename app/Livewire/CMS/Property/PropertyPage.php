<?php

namespace App\Livewire\CMS\Property;

use App\Exports\PropertyExport;
use App\Livewire\Component;
use App\Models\Property;
use App\Services\PropertyService;
use Illuminate\Contracts\View\View;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Url;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class PropertyPage extends Component
{
    #[Url(except: '')]
    public string $search = '';

    public function resetFilter(): void
    {
        $this->resetPage();

        $this->reset([
            'search',
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

    public function getProperties(bool $paginate = true): object
    {
        return (new PropertyService)->index(
            search: $this->search,
            paginate: $paginate,
        );
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
            'properties' => $this->getProperties(),
        ]);
    }
}
