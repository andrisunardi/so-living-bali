<?php

use App\Livewire\Component;
use App\Livewire\Forms\Contact\ContactSubmitForm;
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
        } catch (\Throwable $e) {
            $this->alertError(title: trans('contact.form.failed.title'), body: 'Something went wrong');
        }
    }
};
?>

<div class="slb-lead p-4 p-lg-5" id="enquiry">
    <div class="row g-4 g-lg-5">
        <div class="col-lg-5">
            <h2 class="h3 fw-semibold slb-lead-title">Interested in this property?</h2>
            <p class="slb-lead-copy mt-3 mb-4">
                Leave your details and our team will get back to you about {{ $propertyName }}.
            </p>

            <ul class="list-unstyled d-grid gap-3 mb-0">
                <li class="slb-lead-feature d-flex align-items-start gap-3">
                    <span class="fas fa-circle-info fa-fw mt-1"></span>
                    <span>Get detailed information and documents for this property.</span>
                </li>
                <li class="slb-lead-feature d-flex align-items-start gap-3">
                    <span class="fas fa-calendar-check fa-fw mt-1"></span>
                    <span>Schedule a private viewing at a time that suits you.</span>
                </li>
                <li class="slb-lead-feature d-flex align-items-start gap-3">
                    <span class="fab fa-whatsapp fa-fw mt-1"></span>
                    <span>Chat with our team directly on WhatsApp.</span>
                </li>
            </ul>
        </div>

        <div class="col-lg-7">
            <x-alert-error />

            <form wire:submit.prevent="submit" role="form" autocomplete="off">
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label" for="enquiry-name">Name</label>
                        <input type="text" class="form-control rounded-3" id="enquiry-name" name="name"
                            maxlength="50" placeholder="Your name" wire:model="form.name">
                        @error('form.name')
                            <div class="form-text text-white-50">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="enquiry-phone">WhatsApp</label>
                        <input type="tel" class="form-control rounded-3" id="enquiry-phone" name="phone"
                            maxlength="20" placeholder="Your WhatsApp number" required wire:model="form.phone">
                        @error('form.phone')
                            <div class="form-text text-white-50">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="enquiry-email">Email</label>
                        <input type="email" class="form-control rounded-3" id="enquiry-email" name="email"
                            maxlength="50" placeholder="Your email" required wire:model="form.email">
                        @error('form.email')
                            <div class="form-text text-white-50">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label class="form-label d-block">I am interested in</label>
                        <div class="row g-2">
                            <div class="col-6">
                                <input type="radio" class="btn-check" name="interest"
                                    id="interest-more-information" value="more_information" wire:model="interest"
                                    autocomplete="off">
                                <label class="btn rounded-pill w-100" for="interest-more-information">
                                    More Information
                                </label>
                            </div>
                            <div class="col-6">
                                <input type="radio" class="btn-check" name="interest"
                                    id="interest-booking-a-viewing" value="booking_a_viewing" wire:model="interest"
                                    autocomplete="off">
                                <label class="btn rounded-pill w-100" for="interest-booking-a-viewing">
                                    Booking a Viewing
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-send rounded-pill w-100" wire:loading.attr="disabled"
                            wire:target="submit">
                            <span wire:loading.remove wire:target="submit">
                                <span class="fas fa-paper-plane fa-fw"></span>
                                Send request
                            </span>
                            <span wire:loading wire:target="submit">
                                <span class="spinner-border spinner-border-sm"></span>
                                Send request
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
