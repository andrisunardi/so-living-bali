@section('title', trans('page.contact'))
@section('icon', 'fas fa-plus')

<div class="container-fluid">
    <div class="card">
        <div class="card-header text-bg-primary">
            <span class="fas fa-plus fa-fw"></span>
            {{ trans('index.add') }} @yield('title')
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-auto">
                    <a draggable="false" class="btn btn-primary w-100" href="{{ route('cms.contact.index') }}"
                        wire:navigate>
                        <span class="fas fa-arrow-left fa-fw"></span>
                        {{ trans('index.back') }}
                    </a>
                </div>
            </div>

            <hr />

            <form wire:submit.prevent="submit" role="form" autocomplete="off">
                <div class="row g-3 mb-3">
                    <div class="col-12">
                        <label class="form-label" for="code">
                            {{ trans('validation.attributes.code') }}
                            <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-code fa-fw "></span>
                            </div>
                            <input type="text" class="form-control" id="code" name="code" minlength="20"
                                maxlength="20" placeholder="{{ trans('index.ex') . '. ABCDEFGHIJKLMNOPQRST' }}" required
                                wire:model="form.code" wire:offline.class="disabled" wire:offline.attr="disabled"
                                wire:loading.class="disabled" wire:loading.attr="disabled">
                        </div>
                        @error('form.code')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="name">
                            {{ trans('validation.attributes.name') }}
                            <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-user fa-fw "></span>
                            </div>
                            <input type="text" class="form-control" id="name" name="name" minlength="1"
                                maxlength="50" placeholder="{{ trans('index.ex') . '. John Doe' }}" required
                                wire:model="form.name" wire:offline.class="disabled" wire:offline.attr="disabled"
                                wire:loading.class="disabled" wire:loading.attr="disabled">
                        </div>
                        @error('form.name')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="company">
                            {{ trans('validation.attributes.company') }}
                            <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-building fa-fw "></span>
                            </div>
                            <input type="text" class="form-control" id="company" name="company" minlength="1"
                                maxlength="50" placeholder="{{ trans('index.ex') . '. PT. Bali Real Estate' }}"
                                required wire:model="form.company" wire:offline.class="disabled"
                                wire:offline.attr="disabled" wire:loading.class="disabled" wire:loading.attr="disabled">
                        </div>
                        @error('form.company')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="email">
                            {{ trans('validation.attributes.email') }}
                            <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-envelope fa-fw "></span>
                            </div>
                            <input type="phone" class="form-control" id="email" name="email" minlength="1"
                                maxlength="50" placeholder="{{ trans('index.ex') . '. johndoe@gmail.com' }}" required
                                wire:model="form.email" wire:offline.class="disabled" wire:offline.attr="disabled"
                                wire:loading.class="disabled" wire:loading.attr="disabled">
                        </div>
                        @error('form.email')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="phone">
                            {{ trans('validation.attributes.phone') }}
                            <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-phone fa-fw "></span>
                            </div>
                            <input type="tel" class="form-control" id="phone" name="phone" minlength="1"
                                maxlength="20" placeholder="{{ trans('index.ex') . '. 6281234567890' }}" required
                                wire:model="form.phone" wire:offline.class="disabled" wire:offline.attr="disabled"
                                wire:loading.class="disabled" wire:loading.attr="disabled">
                        </div>
                        @error('form.phone')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr />

                <div class="row">
                    <div class="col-6 col-sm-auto">
                        <button type="submit" class="btn btn-primary w-100" wire:click="submit" wire:key="submit"
                            wire:offline.class="disabled" wire:offline.attr="disabled" wire:loading.class="disabled"
                            wire:loading.attr="disabled">
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
                            wire:key="resetForm" wire:offline.class="disabled" wire:offline.attr="disabled"
                            wire:loading.class="disabled" wire:loading.attr="disabled">
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
