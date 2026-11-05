<?php

use App\Livewire\Component;
use App\Livewire\Forms\CMS\Testimonial\TestimonialAddForm;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Title;

new #[Title('Add | Testimonial')] class extends Component
{
    public TestimonialAddForm $form;

    public function resetForm(): void
    {
        $this->form->reset();
    }

    public function submit(): void
    {
        try {
            $this->form->submit();

            session()->flash('success', [
                'title' => trans('index.add').' '.trans('index.success'),
                'message' => trans('page.testimonial').' '.trans('message.has_been_successfully_added'),
            ]);

            $this->redirect(route('cms.testimonial.index'), navigate: true);
        } catch (ValidationException $e) {
            $errors = collect($e->validator->errors()->all())->implode('<br>');

            $this->alertError(title: trans('index.add').' '.trans('index.failed'), body: $errors);
        }
    }
};
?>

@section('title', trans('page.testimonial'))

<div class="container-fluid">
    <div class="card">
        <div class="card-header text-bg-primary">
            <span class="fas fa-plus fa-fw"></span>
            {{ trans('index.add') }} @yield('title')
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-auto">
                    <a draggable="false" class="btn btn-primary w-100" href="{{ route('cms.testimonial.index') }}"
                        wire:navigate>
                        <span class="fas fa-arrow-left fa-fw"></span>
                        {{ trans('index.back') }}
                    </a>
                </div>
            </div>

            <hr />

            <x-alert-error />

            <form wire:submit.prevent="submit" role="form" autocomplete="off">
                <div class="row g-3">
                    <div class="col-sm-4">
                        <label class="form-label" for="name">
                            {{ trans('validation.attributes.name') }}
                            <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-user fa-fw "></span>
                            </div>
                            <input type="text" class="form-control" id="name" name="name" minlength="1"
                                maxlength="100" placeholder="{{ trans('index.ex') }} Ash & Noma Nainar" required
                                wire:model="form.name" wire:offline.class="disabled" wire:offline.attr="disabled"
                                wire:loading.class="disabled" wire:loading.attr="disabled">
                        </div>
                        <div class="form-text">
                            {{ trans('helper.required') }},
                            {{ trans('helper.minlength') }} : 1,
                            {{ trans('helper.maxlength') }} : 100,
                        </div>
                        @error('form.name')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-4">
                        <label class="form-label" for="job">
                            {{ trans('validation.attributes.job') }}
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-briefcase fa-fw "></span>
                            </div>
                            <input type="text" class="form-control" id="job" name="job" minlength="1"
                                maxlength="100" placeholder="{{ trans('index.ex') }} CEO" wire:model="form.job"
                                wire:offline.class="disabled" wire:offline.attr="disabled" wire:loading.class="disabled"
                                wire:loading.attr="disabled">
                        </div>
                        <div class="form-text">
                            {{ trans('helper.minlength') }} : 1,
                            {{ trans('helper.maxlength') }} : 100,
                        </div>
                        @error('form.job')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-4">
                        <label class="form-label" for="company">
                            {{ trans('validation.attributes.company') }}
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-building fa-fw "></span>
                            </div>
                            <input type="text" class="form-control" id="company" name="company" minlength="1"
                                maxlength="100" placeholder="{{ trans('index.ex') }} New Delhi"
                                wire:model="form.company" wire:offline.class="disabled" wire:offline.attr="disabled"
                                wire:loading.class="disabled" wire:loading.attr="disabled">
                        </div>
                        <div class="form-text">
                            {{ trans('helper.minlength') }} : 1,
                            {{ trans('helper.maxlength') }} : 100,
                        </div>
                        @error('form.company')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label class="form-label" for="word">
                            {{ trans('validation.attributes.word') }}
                            <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-quote-right fa-fw "></span>
                            </div>
                            <textarea class="form-control" id="word" name="word" rows="5" minlength="1" maxlength="1000"
                                placeholder="{{ trans('index.ex') }} We were delighted with the service..." required wire:model="form.word"
                                wire:offline.class="disabled" wire:offline.attr="disabled" wire:loading.class="disabled"
                                wire:loading.attr="disabled"></textarea>
                        </div>
                        <div class="form-text">
                            {{ trans('helper.required') }},
                            {{ trans('helper.minlength') }} : 1,
                            {{ trans('helper.maxlength') }} : 1.000,
                        </div>
                        @error('form.word')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr />

                <div class="row">
                    <div class="col-6 col-sm-auto">
                        <button type="submit" class="btn btn-primary w-100" wire:offline.class="disabled"
                            wire:offline.attr="disabled" wire:loading.class="disabled" wire:loading.attr="disabled">
                            <span wire:loading.remove wire:target="submit">
                                <span class="fas fa-paper-plane fa-fw"></span>
                                {{ trans('index.submit') }}
                            </span>
                            <span wire:loading wire:target="submit" class="w-100">
                                <span class="spinner-border spinner-border-sm"></span>
                                {{ trans('index.submit') }}
                            </span>
                        </button>
                    </div>
                    <div class="col-6 col-sm-auto">
                        <button type="button" class="btn btn-warning w-100" wire:click="resetForm"
                            wire:offline.class="disabled" wire:offline.attr="disabled" wire:loading.class="disabled"
                            wire:loading.attr="disabled">
                            <span wire:loading.remove wire:target="resetForm">
                                <span class="fas fa-eraser fa-fw"></span>
                                {{ trans('index.reset') }}
                            </span>
                            <span wire:loading wire:target="resetForm" class="w-100">
                                <span class="spinner-border spinner-border-sm"></span>
                                {{ trans('index.reset') }}
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
