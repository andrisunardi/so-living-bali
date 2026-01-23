<?php

namespace App\Livewire\CMS\User;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\User\UserAddForm;
use App\Services\RoleService;
use Illuminate\Contracts\View\View;

class UserAddPage extends Component
{
    public UserAddForm $form;

    public function resetFields(): void
    {
        $this->form->reset();
    }

    public function submit(): void
    {
        $this->form->submit();

        session()->flash('success', [
            'title' => trans('index.add').' '.trans('index.success'),
            'message' => trans('page.user').' '.trans('message.has_been_successfully_added'),
        ]);

        $this->redirect(route('cms.user.index'), navigate: true);
    }

    public function getRoles(): object
    {
        return (new RoleService)->index(
            orderBy: 'name',
            sortBy: 'asc',
            paginate: false,
        );
    }

    public function render(): View
    {
        return view('livewire.cms.user.add', [
            'roles' => $this->getRoles(),
        ]);
    }
}
