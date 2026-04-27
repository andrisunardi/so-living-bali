<?php

use App\Livewire\Component;
use App\Services\ValueService;

new class extends Component {
    public function values(): object
    {
        $service = new ValueService();
        return $service->index(isActive: [true], orderBy: 'id', sortBy: 'asc', paginate: false);
    }
};
?>

<section class="py-5 my-5">
    <div class="container-md">
        <div class="d-grid gap-4">
            <div class="text-center">
                <p class="lead mb-0">{{ trans('home.our_values.sub_title') }}</p>
                <h2 class="display-6 fw-medium">{{ trans('home.our_values.title') }}</h2>
                <p class="small px-sm-5">{{ trans('home.our_values.description') }}</p>
            </div>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 justify-content-end g-3">
                @foreach ($this->values() as $value)
                    <div class="col">
                        <div class="card card-body h-100">
                            <div class="mb-4">
                                <span class="fa-stack fa-xl">
                                    <i class="fas fa-circle fa-stack-2x fa-inverse text-light"></i>
                                    <i class="{{ $value->icon }} fa-stack-1x text-success"></i>
                                </span>
                            </div>
                            <h5 class="card-title">{{ $value->translate_title }}</h5>
                            <p class="card-text">{{ $value->translate_short_description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
