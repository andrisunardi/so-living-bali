<?php

namespace App\Livewire\CMS\Contact;

use App\Exports\ContactExport;
use App\Livewire\Component;
use App\Models\Contact;
use App\Services\ContactService;
use Illuminate\Contracts\View\View;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Url;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ContactPage extends Component
{
    #[Url(except: '')]
    public $search = '';

    #[Url(except: '')]
    public $start_date = '';

    #[Url(except: '')]
    public $end_date = '';

    public function mount(): void
    {
        if (session()->has('error')) {
            LivewireAlert::title(session('error.title'))
                ->html(session('error.message'))
                ->withConfirmButton('OK')
                ->confirmButtonColor('#dc3545')
                ->error()
                ->show();
        }

        if (session()->has('success')) {
            LivewireAlert::title(session('success.title'))
                ->html(session('success.message'))
                ->withConfirmButton('OK')
                ->confirmButtonColor('#198754')
                ->success()
                ->show();
        }
    }

    public function resetFilter(): void
    {
        $this->resetPage();

        $this->reset([
            'search',
            'start_date',
            'end_date',
        ]);
    }

    public function updating(): void
    {
        $this->resetPage();
    }

    public function delete(Contact $contact): void
    {
        (new ContactService)->delete(contact: $contact);

        LivewireAlert::title(trans('index.delete').' '.trans('index.success'))
            ->html(trans('page.contact').' '.trans('message.has_been_successfully_deleted'))
            ->withConfirmButton('OK')
            ->confirmButtonColor('#198754')
            ->success()
            ->show();
    }

    public function getContacts(bool $paginate = true): object
    {
        return (new ContactService)->index(
            search: $this->search,
            startDate: $this->start_date,
            endDate: $this->end_date,
            paginate: $paginate,
        );
    }

    public function export(): BinaryFileResponse
    {
        LivewireAlert::title(trans('index.export').' '.trans('index.success'))
            ->html(trans('page.contact').' '.trans('message.has_been_successfully_exported'))
            ->withConfirmButton('OK')
            ->confirmButtonColor('#198754')
            ->success()
            ->show();

        return Excel::download(new ContactExport(
            startDate: $this->start_date,
            endDate: $this->end_date,
            contacts: $this->getContacts(paginate: false),
        ), trans('page.contact').'.xlsx');
    }

    public function render(): View
    {
        return view('livewire.cms.contact.index', [
            'contacts' => $this->getContacts(),
        ]);
    }
}
