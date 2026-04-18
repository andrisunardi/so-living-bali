<?php

use App\Livewire\Component;
use Livewire\Attributes\Title;

new #[Title('Contact')] class extends Component {};
?>

@section('title', trans('page.contact'))

<div>
    @livewire('contact.header')
</div>
