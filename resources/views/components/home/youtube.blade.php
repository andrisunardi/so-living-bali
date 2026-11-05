@php
    $channelId = config('constants.youtube.channel_id');
    $channelUrl = config('constants.youtube.channel_url');
    $playlistId = $channelId ? 'UU' . Str::after($channelId, 'UC') : null;
@endphp

@if ($playlistId)
    <section class="py-5">
        <div class="container-md py-5">
            <div class="d-grid gap-4">
                <div class="text-center">
                    <p class="lead mb-0 text-uppercase text-success">{{ trans('home.youtube.sub_title') }}</p>
                    <h2 class="display-6 fw-medium">{{ trans('home.youtube.title') }}</h2>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-10 col-xl-9">
                        <div class="ratio ratio-16x9 rounded-4 overflow-hidden shadow-sm bg-dark">
                            <iframe class="w-100 h-100 border-0" loading="lazy"
                                src="https://www.youtube-nocookie.com/embed/videoseries?list={{ $playlistId }}&rel=0&modestbranding=1"
                                title="{{ config('constants.meta.title') }} - YouTube"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>

                @if ($channelUrl)
                    <div class="text-center">
                        <a draggable="false" class="btn btn-danger rounded-pill px-4" href="{{ $channelUrl }}"
                            target="_blank" rel="noopener">
                            <span class="fab fa-youtube fa-fw"></span>
                            {{ trans('home.youtube.button') }}
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endif
