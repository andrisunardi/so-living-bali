@props([
    'property' => null,
])

@php($whatsappText = rawurlencode('Hello, I am interested in '.$property->name.' ('.$property->code.') on solivingbali.com'))

<div class="slb-sticky slb-sticky-hidden d-lg-none p-2" id="sale-sticky-cta">
    <div class="container-md">
        <div class="row g-2">
            <div class="col-4">
                <a draggable="false" class="btn btn-success rounded-pill w-100 btn-sm"
                    href="https://api.whatsapp.com/send/?phone={{ Str::slug(config('constants.contact.whatsapp'), '') }}&text={{ $whatsappText }}"
                    target="_blank">
                    <span class="fab fa-whatsapp fa-fw"></span>
                </a>
            </div>
            <div class="col-4">
                <a draggable="false" class="btn btn-slb rounded-pill w-100 btn-sm"
                    href="#enquiry"
                    onclick="document.getElementById('interest-more-information')?.click();">
                    Request info
                </a>
            </div>
            <div class="col-4">
                <a draggable="false" class="btn btn-outline-slb rounded-pill w-100 btn-sm"
                    href="#enquiry"
                    onclick="document.getElementById('interest-booking-a-viewing')?.click();">
                    Book viewing
                </a>
            </div>
        </div>
    </div>
</div>
