<?php

use App\Livewire\Component;
use App\Livewire\Forms\Contact\ContactSubmitForm;
use Illuminate\Validation\Exception;
use Illuminate\Validation\ValidationException;

new class extends Component {
    public ContactSubmitForm $form;

    public string $propertyName = '';

    public string $propertyCode = '';

    public string $interest = 'more_information';

    public function mount(string $propertyName = '', string $propertyCode = ''): void
    {
        $this->propertyName = $propertyName;
        $this->propertyCode = $propertyCode;
    }

    public function submit(): void
    {
        try {
            $interestLabel = $this->interest === 'booking_a_viewing' ? 'Booking a Viewing' : 'More Information';

            $this->form->message = "Interest: {$interestLabel} - Property: {$this->propertyName} ({$this->propertyCode})";

            $data = $this->form->validate();
            $data['tags'] = ['Lead Form', 'Property For Sale', $interestLabel];

            (new App\Services\ContactService)->create(data: $data);

            $this->alertSuccess(title: trans('contact.form.success.title'), body: trans('contact.form.success.body'));

            $this->form->reset();
            $this->interest = 'more_information';
        } catch (ValidationException $e) {
            $errors = collect($e->validator->errors()->all())->implode('<br>');

            $this->alertError(title: trans('contact.form.failed.title'), body: $errors);
        } catch (Exception $e) {
            $this->alertError(title: trans('contact.form.failed.title'), body: 'Something went wrong');
        }
    }
};
?>

<div class="slb-lead p-4 p-lg-5" id="enquiry">
    <div class="row g-4 align-items-center">
        <div class="col-lg-5">
            <h2 class="h4 fw-semibold text-brand-dark">Interested in this property?</h2>
            <p class="text-mute mb-0">
                Leave your details and our team will get back to you about {{ $propertyName }}.
            </p>
        </div>

        <div class="col-lg-7">
            <div class="card card-body rounded-4 slb-lead-form">
                <x-alert-error />

                <form wire:submit.prevent="submit" role="form" autocomplete="off">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label" for="enquiry-name">Name</label>
                            <input type="text" class="form-control rounded-3" id="enquiry-name" name="name"
                                maxlength="50" placeholder="Your name" wire:model="form.name">
                            @error('form.name')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-6">
                            <label class="form-label" for="enquiry-phone">WhatsApp</label>
                            <input type="tel" class="form-control rounded-3" id="enquiry-phone" name="phone"
                                maxlength="20" placeholder="Your WhatsApp number" required wire:model="form.phone">
                            @error('form.phone')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-6">
                            <label class="form-label" for="enquiry-email">Email</label>
                            <input type="email" class="form-control rounded-3" id="enquiry-email" name="email"
                                maxlength="50" placeholder="Your email" required wire:model="form.email">
                            @error('form.email')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <div class="d-flex flex-wrap gap-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="interest"
                                        id="interest-more-information" value="more_information"
                                        wire:model="interest">
                                    <label class="form-check-label" for="interest-more-information">
                                        More Information
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="interest"
                                        id="interest-booking-a-viewing" value="booking_a_viewing"
                                        wire:model="interest">
                                    <label class="form-check-label" for="interest-booking-a-viewing">
                                        Booking a Viewing
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-slb rounded-pill w-100" wire:loading.attr="disabled"
                                wire:target="submit">
                                <span wire:loading.remove wire:target="submit">
                                    <span class="fas fa-paper-plane fa-fw"></span>
                                    Send enquiry
                                </span>
                                <span wire:loading wire:target="submit">
                                    <span class="spinner-border spinner-border-sm"></span>
                                    Send enquiry
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
