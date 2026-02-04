<?php

namespace App\Livewire\CMS\User;

use App\Exports\UserExport;
use App\Livewire\Component;
use App\Models\User;
use App\Services\RoleService;
use App\Services\UserService;
use Illuminate\Contracts\View\View;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Url;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class UserPage extends Component
{
    #[Url(except: '')]
    public string $search = '';

    #[Url(except: [])]
    public array $is_active = [];

    #[Url(except: '')]
    public string $role_id = '';

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

    public function changeActive(User $user): void
    {
        (new UserService)->active(user: $user);

        LivewireAlert::title(trans('index.change_active').' '.trans('index.success'))
            ->html(trans('page.user').' '.trans('message.has_been_successfully_changed'))
            ->withConfirmButton('OK')
            ->confirmButtonColor('#198754')
            ->success()
            ->show();
    }

    public function delete(User $user): void
    {
        (new UserService)->delete(user: $user);

        LivewireAlert::title(trans('index.delete').' '.trans('index.success'))
            ->html(trans('page.user').' '.trans('message.has_been_successfully_deleted'))
            ->withConfirmButton('OK')
            ->confirmButtonColor('#198754')
            ->success()
            ->show();
    }

    public function getRoles(): object
    {
        return (new RoleService)->index(
            orderBy: 'name',
            sortBy: 'asc',
            paginate: false,
        );
    }

    public function getUsers(bool $paginate = true): object
    {
        $users = (new UserService)->index(
            search: $this->search,
            isActive: $this->is_active,
            roleId: $this->role_id,
            paginate: $paginate,
        );

        $users->loadCount(['properties']);
        $users->loadMissing(['roles']);

        return $users;
    }

    public function export(): BinaryFileResponse
    {
        LivewireAlert::title(trans('index.export').' '.trans('index.success'))
            ->html(trans('page.user').' '.trans('message.has_been_successfully_exported'))
            ->withConfirmButton('OK')
            ->confirmButtonColor('#198754')
            ->success()
            ->show();

        return Excel::download(new UserExport(
            roleId: $this->role_id,
            isActive: $this->is_active,
            users: $this->getUsers(paginate: false),
        ), trans('page.user').'.xlsx');
    }

    public function render(): View
    {
        return view('livewire.cms.user.index', [
            'roles' => $this->getRoles(),
            'users' => $this->getUsers(),
        ]);
    }
}
