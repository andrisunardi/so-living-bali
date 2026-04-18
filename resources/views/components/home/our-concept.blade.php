<?php

use App\Livewire\Component;
use App\Services\ConceptService;

new class extends Component {
    public function concepts(): object
    {
        $service = new ConceptService();
        return $service->index(isActive: [true], orderBy: 'id', sortBy: 'asc', paginate: false);
    }
};
?>

<section class="py-5 my-5">
    <div class="container-md">
        <div class="d-grid gap-4">
            <div class="row justify-content-center">
                <div class="col-xl-9">
                    <div class="text-center">
                        <p class="lead mb-0">{{ trans('home.our_concept.sub_title') }}</p>
                        <h2 class="display-6 fw-bold">{{ trans('home.our_concept.title') }}</h2>
                        <p class="small px-sm-5">{{ trans('home.our_concept.description') }}</p>
                    </div>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 justify-content-end g-3">
                @foreach ($this->concepts() as $concept)
                    <div class="col">
                        <div class="card card-body">
                            <div class="mb-4">
                                <span class="fa-stack fa-xl">
                                    <i class="fas fa-circle fa-stack-2x fa-inverse text-light"></i>
                                    <i class="{{ $concept->icon }} fa-stack-1x text-success"></i>
                                </span>
                            </div>
                            <h5 class="card-title">{{ $concept->translate_title }}</h5>
                            <p class="card-text">{{ $concept->translate_description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
