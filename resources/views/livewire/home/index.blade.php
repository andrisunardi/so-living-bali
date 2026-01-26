@section('title', trans('page.home'))

<div>
    @livewire('components.home.hero', [
        'title' => trans('home.hero.title') ?? null,
        'description' => trans('home.hero.description') ?? null,
        'image' => asset('images/banner/home.jpg'),
    ])
</div>
