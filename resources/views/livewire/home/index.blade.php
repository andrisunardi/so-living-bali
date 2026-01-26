@section('title', trans('page.home'))

<div>
    @livewire('layouts.hero', [
        // 'title' => $page['title'] ?? null,
        // 'subTitle' => $page['sub_title'] ?? null,
        // 'description' => $page['description'] ?? null,
        // 'buttonName' => trans('index.reservation'),
        // 'buttonLink' => route('reservation'),
        // 'isExternalLink' => false,
        'videoDesktop' => asset('videos/home.mp4'),
        'videoMobile' => asset('videos/home.mp4'),
    ])
</div>
