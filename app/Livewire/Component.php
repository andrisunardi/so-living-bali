<?php

namespace App\Livewire;

use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component as LivewireComponent;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Component extends LivewireComponent
{
    use WithFileUploads;
    use WithPagination;

    public function boot(): void
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

    public function alertSuccess(string $title = '', string $body = ''): void
    {
        LivewireAlert::title($title)->html($body)->withConfirmButton('OK')->confirmButtonColor('#198754')->success()->show();
    }

    public function alertError(string $title = '', string $body = ''): void
    {
        LivewireAlert::title($title)->html($body)->withConfirmButton('OK')->confirmButtonColor('#dc3545')->error()->show();
    }
}
