<?php

namespace App\Livewire\CMS;

use App\Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Logout extends Component
{
    public function mount(): void
    {
        Auth::logout();
        Session::flush();

        session()->flash('success', [
            'title' => trans('index.logout').' '.trans('index.success'),
            'message' => trans('field.you_have_been_successfully_logged_out'),
        ]);

        $this->redirect(route('cms.login'), navigate: true);
    }
}
