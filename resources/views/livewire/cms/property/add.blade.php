@section('title', trans('page.property'))
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
                    <a draggable="false" class="btn btn-primary w-100" href="{{ route('cms.property.index') }}"
                        wire:navigate>
                        <span class="fas fa-arrow-left fa-fw"></span>
                        {{ trans('index.back') }}
                    </a>
                </div>
            </div>

            <hr />

            <form wire:submit.prevent="submit" role="form" autocomplete="off">
                <h5 class="fw-bold text-uppercase border-bottom pb-3">
                    {{ trans('property.property_identity') }}
                </h5>

                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <label class="form-label" for="code">
                            {{ trans('property.internal_property_code') }}
                            <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-code fa-fw "></span>
                            </div>
                            <input type="text" class="form-control" id="code" name="code" minlength="1"
                                maxlength="10" placeholder="{{ trans('index.ex') . '. ABCDE12345' }}" required
                                wire:model="form.code" wire:offline.class="disabled" wire:offline.attr="disabled"
                                wire:loading.class="disabled" wire:loading.attr="disabled">
                        </div>
                        <div class="form-text">
                            {{ trans('helper.minlength') }} : 1,
                            {{ trans('helper.maxlength') }} : 10,
                            {{ trans('helper.unique') }}
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
                                <span class="fas fa-building fa-fw "></span>
                            </div>
                            <input type="text" class="form-control" id="name" name="name" minlength="1"
                                maxlength="50" placeholder="{{ trans('index.ex') . '. Canggu Villa' }}" required
                                wire:model="form.name" wire:offline.class="disabled" wire:offline.attr="disabled"
                                wire:loading.class="disabled" wire:loading.attr="disabled">
                        </div>
                        <div class="form-text">
                            {{ trans('helper.minlength') }} : 1,
                            {{ trans('helper.maxlength') }} : 50
                        </div>
                        @error('form.name')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12" wire:ignore>
                        <label class="form-label" for="user_id">
                            {{ trans('property.agent_name') }}
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-user fa-fw "></span>
                            </div>
                            <select class="form-select select2" id="user_id" name="user_id" wire:key="user_id"
                                wire:model.lazy="user_id" wire:offline.class="disabled" wire:offline.attr="disabled"
                                wire:loading.class="disabled" wire:loading.attr="disabled">
                                <option value="">{{ trans('index.select') }} {{ trans('page.user') }}</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" wire:key="user-{{ $user->id }}">
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('form.code')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="availability_date">
                            {{ trans('property.availability_date') }}
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-calendar fa-fw "></span>
                            </div>
                            <input type="date" class="form-control" id="availability_date" name="availability_date"
                                min="{{ now()->toDateString() }}" max="2099-12-31" wire:model="form.availability_date"
                                wire:offline.class="disabled" wire:offline.attr="disabled" wire:loading.class="disabled"
                                wire:loading.attr="disabled">
                        </div>
                        <div class="form-text">
                            {{ trans('helper.min') }} : {{ trans('index.today') }},
                            {{ trans('helper.max') }} : {{ Date::parse('2099-12-31')->isoFormat('DD MMMM YYYY') }}
                        </div>
                        @error('form.availability_date')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="visit_date">
                            {{ trans('property.date_of_visit') }}
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-calendar fa-fw "></span>
                            </div>
                            <input type="date" class="form-control" id="visit_date" name="visit_date"
                                min="{{ now()->toDateString() }}" max="2099-12-31" wire:model="form.visit_date"
                                wire:offline.class="disabled" wire:offline.attr="disabled" wire:loading.class="disabled"
                                wire:loading.attr="disabled">
                        </div>
                        <div class="form-text">
                            {{ trans('helper.min') }} : {{ trans('index.today') }},
                            {{ trans('helper.max') }} : {{ Date::parse('2099-12-31')->isoFormat('DD MMMM YYYY') }}
                        </div>
                        @error('form.visit_date')
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
