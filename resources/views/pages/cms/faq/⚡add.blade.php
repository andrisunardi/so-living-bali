<?php

use App\Livewire\Component;
use App\Livewire\Forms\CMS\Faq\FaqAddForm;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Title;

new #[Title('Add | Faq')] class extends Component {
    public FaqAddForm $form;

    public function resetForm(): void
    {
        $this->form->reset();
    }

    public function submit(): void
    {
        try {
            $this->form->submit();

            session()->flash('success', [
                'title' => trans('index.add') . ' ' . trans('index.success'),
                'message' => trans('page.faq') . ' ' . trans('message.has_been_successfully_added'),
            ]);

            $this->redirect(route('cms.faq.index'), navigate: true);
        } catch (ValidationException $e) {
            $errors = collect($e->validator->errors()->all())->implode('<br>');

            $this->alertError(title: trans('index.add') . ' ' . trans('index.failed'), body: $errors);
        }
    }
};
?>

@section('title', trans('page.faq'))

<div class="container-fluid">
    <div class="card">
        <div class="card-header text-bg-primary">
            <span class="fas fa-plus fa-fw"></span>
            {{ trans('index.add') }} @yield('title')
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-auto">
                    <a draggable="false" class="btn btn-primary w-100" href="{{ route('cms.faq.index') }}" wire:navigate>
                        <span class="fas fa-arrow-left fa-fw"></span>
                        {{ trans('index.back') }}
                    </a>
                </div>
            </div>

            <hr />

            <x-alert-error />

            <form wire:submit.prevent="submit" role="form" autocomplete="off">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label class="form-label" for="question">
                            {{ trans('validation.attributes.question') }}
                            <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-font fa-fw "></span>
                            </div>
                            <input type="text" class="form-control" id="question" name="question" minlength="1"
                                maxlength="100" placeholder="{{ trans('index.ex') }} Question" required
                                wire:model="form.question" wire:offline.class="disabled" wire:offline.attr="disabled"
                                wire:loading.class="disabled" wire:loading.attr="disabled">
                        </div>
                        <div class="form-text">
                            {{ trans('helper.required') }},
                            {{ trans('helper.minlength') }} : 1,
                            {{ trans('helper.maxlength') }} : 100,
                            {{ trans('helper.unique') }}
                        </div>
                        @error('form.question')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="question_id">
                            {{ trans('validation.attributes.question_id') }}
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-font fa-fw "></span>
                            </div>
                            <input type="text" class="form-control" id="question_id" name="question_id"
                                minlength="1" maxlength="100" placeholder="{{ trans('index.ex') }} Question"
                                wire:model="form.question_id" wire:offline.class="disabled" wire:offline.attr="disabled"
                                wire:loading.class="disabled" wire:loading.attr="disabled">
                        </div>
                        <div class="form-text">
                            {{ trans('helper.minlength') }} : 1,
                            {{ trans('helper.maxlength') }} : 100
                        </div>
                        @error('form.question_id')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="question_fr">
                            {{ trans('validation.attributes.question_fr') }}
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-font fa-fw "></span>
                            </div>
                            <input type="text" class="form-control" id="question_fr" name="question_fr"
                                minlength="1" maxlength="100" placeholder="{{ trans('index.ex') }} Question"
                                wire:model="form.question_fr" wire:offline.class="disabled" wire:offline.attr="disabled"
                                wire:loading.class="disabled" wire:loading.attr="disabled">
                        </div>
                        <div class="form-text">
                            {{ trans('helper.minlength') }} : 1,
                            {{ trans('helper.maxlength') }} : 100
                        </div>
                        @error('form.question_fr')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="answer">
                            {{ trans('validation.attributes.answer') }}
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-file-text fa-fw "></span>
                            </div>
                            <textarea class="form-control" id="answer" name="answer" minlength="1" maxlength="100"
                                placeholder="{{ trans('index.ex') }} Answer" wire:model="form.answer" wire:offline.class="disabled"
                                wire:offline.attr="disabled" wire:loading.class="disabled" wire:loading.attr="disabled"></textarea>
                        </div>
                        <div class="form-text">
                            {{ trans('helper.minlength') }} : 1,
                            {{ trans('helper.maxlength') }} : 100,
                        </div>
                        @error('form.answer')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="answer_id">
                            {{ trans('validation.attributes.answer_id') }}
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-file-text fa-fw "></span>
                            </div>
                            <textarea class="form-control" id="answer_id" name="answer_id" minlength="1" maxlength="100"
                                placeholder="{{ trans('index.ex') }} Answer" wire:model="form.answer_id" wire:offline.class="disabled"
                                wire:offline.attr="disabled" wire:loading.class="disabled" wire:loading.attr="disabled"></textarea>
                        </div>
                        <div class="form-text">
                            {{ trans('helper.minlength') }} : 1,
                            {{ trans('helper.maxlength') }} : 100,
                        </div>
                        @error('form.answer_id')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="answer_fr">
                            {{ trans('validation.attributes.answer_fr') }}
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-file-text fa-fw "></span>
                            </div>
                            <textarea class="form-control" id="answer_fr" name="answer_fr" minlength="1" maxlength="100"
                                placeholder="{{ trans('index.ex') }} Answer" wire:model="form.answer_fr" wire:offline.class="disabled"
                                wire:offline.attr="disabled" wire:loading.class="disabled" wire:loading.attr="disabled"></textarea>
                        </div>
                        <div class="form-text">
                            {{ trans('helper.minlength') }} : 1,
                            {{ trans('helper.maxlength') }} : 100,
                        </div>
                        @error('form.answer_fr')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="is_active">
                            {{ trans('validation.attributes.is_active') }}
                            <span class="text-danger">*</span>
                        </label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" id="is_active_1" name="is_active"
                                    value="1" required wire:model.lazy="form.is_active"
                                    wire:offline.class="disabled" wire:offline.attr="disabled"
                                    wire:loading.class="disabled" wire:loading.attr="disabled">
                                <label class="form-check-label" for="is_active_1">
                                    {{ trans('index.yes') }}
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" id="is_active_0" name="is_active"
                                    value="0" required wire:model.lazy="form.is_active"
                                    wire:offline.class="disabled" wire:offline.attr="disabled"
                                    wire:loading.class="disabled" wire:loading.attr="disabled">
                                <label class="form-check-label" for="is_active_0">
                                    {{ trans('index.no') }}
                                </label>
                            </div>
                        </div>
                        @error('form.is_active')
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
