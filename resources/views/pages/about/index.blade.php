<?php

use App\Livewire\Component;
use Livewire\Attributes\Title;

new #[Title('About')] class extends Component {};
?>

@section('title', trans('page.about'))

<div>
    <x-about.header />

    <x-about.our-story />

    <livewire:about.our-values lazy />
</div>
