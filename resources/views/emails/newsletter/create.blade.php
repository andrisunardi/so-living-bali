<x-mail::message>
<div style="text-align: center">
    <a draggable="false" href="{{ config('constants.web_url') }}" target="_blank">
        <img src="{{ config('constants.logo_atlas_beach_fest') }}" width="150"
            alt="Logo - Atlas Beach Fest - {{ config('app.name') }}">
    </a>
</div>

<br />

# Newsletter Create

<div style="overflow-x: auto; white-space: nowrap;">
    <table width="100%" cellspacing="0" cellpadding="0">
        <tr>
            <td width="30%" style="padding: 5px">ID</td>
            <td width="70%" style="padding: 5px">#{{ $newsletter->id }}</td>
        </tr>
        <tr>
            <td width="30%" style="padding: 5px">Outlet</td>
            <td width="70%" style="padding: 5px">{{ $newsletter->outlet->name }}</td>
        </tr>
        <tr>
            <td width="30%" style="padding: 5px">Email</td>
            <td width="70%" style="padding: 5px">
                <a draggable="false" href="mailto:{{ $newsletter->email }}">
                    {{ $newsletter->email }}
                </a>
            </td>
        </tr>
        <tr>
            <td width="30%" style="padding: 5px">Created At</td>
            <td width="70%" style="padding: 5px">
                {{ $newsletter->created_at->format('H:i - l') }}<br />
                {{ $newsletter->created_at->format('d F Y') }}
            </td>
        </tr>
    </table>
</div>

<div style="margin-top: 10px">
    <small style="color:darkgrey">Swipe right when use mobile phone</small>
</div>

<br />

<div>

<x-mail::button :url="'mailto:' . $newsletter->email">
    Send Email
</x-mail::button>

<br />

<hr />

<br />

<div style="text-align: center">
    <a href="{{ config('constants.web_url') }}">
        <img src="{{ config('constants.logo_a_blue') }}" width="50"
            alt="Logo - A - Blue - {{ config('app.name') }}">
    </a>
</div>

<br />

<h1 style="text-align: center">
    {{ config('constants.name') }}
</h1>

<br />

<div style="text-align: center">
    Address
</div>

<div style="text-align: center">
    <a href="{{ config('constants.google_maps') }}" style="text-decoration: none">
        {!! config('constants.address') !!}
    </a>
</div>

<br />

<div style="text-align: center">
    Contact Us
</div>

<div style="text-align: center">
    Phone:
    <a href="https://api.whatsapp.com/send?phone={{ $newsletter->outlet->contact }}"
        style="text-decoration: none">
        {{ $newsletter->outlet->contact }}
    </a>
</div>

<div style="text-align: center">
    Email:
    <a href="mailto:{{ config('constants.email') }}" style="text-decoration: none">
        {{ config('constants.email') }}
    </a>
</div>
</x-mail::message>
