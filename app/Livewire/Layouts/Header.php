<?php

namespace App\Livewire\Layouts;

use App\Livewire\Component;
use Illuminate\Contracts\View\View;

class Header extends Component
{
    public function getNavigations(): array
    {
        return [
            [
                'id' => 1,
                'name' => trans('page.home'),
                'url' => route('home'),
                'route' => 'home',
                'is_active' => true,
            ],
            [
                'id' => 2,
                'name' => trans('page.service'),
                'url' => route('about'),
                'route' => 'about',
                'is_active' => true,
            ],
            [
                'id' => 3,
                'name' => trans('page.about'),
                'url' => route('about'),
                'route' => 'about',
                'is_active' => true,
            ],
            [
                'id' => 4,
                'name' => trans('page.article'),
                'url' => route('article'),
                'route' => 'article',
                'is_active' => true,
            ],
            [
                'id' => 6,
                'name' => trans('page.contact'),
                'url' => route('contact'),
                'route' => 'contact',
                'is_active' => true,
            ],
        ];
    }

    public function getLanguages(): array
    {
        return [
            [
                'id' => 1,
                'code' => 'en',
                'name' => 'English',
                'image_url' => asset('images/flag/en.svg'),
            ],
            [
                'id' => 2,
                'code' => 'id',
                'name' => 'Indonesia',
                'image_url' => asset('images/flag/id.svg'),
            ],
            [
                'id' => 2,
                'code' => 'zh',
                'name' => 'Chinese',
                'image_url' => asset('images/flag/zh.svg'),
            ],
        ];
    }

    public function render(): View
    {
        return view('livewire.layouts.header', [
            'navigations' => $this->getNavigations(),
            'languages' => $this->getLanguages(),
        ]);
    }
}
