<?php

namespace App\Observers;

use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ContactObserver
{
    public function creating(Contact $contact): void
    {
        $contact->created_by = Auth::user()->id ?? null;
    }

    public function created(Contact $contact): void
    {
        $contact->created_by = Auth::user()->id ?? null;
    }

    public function updating(Contact $contact): void
    {
        $contact->updated_by = Auth::user()->id ?? null;
    }

    public function updated(Contact $contact): void
    {
        $contact->updated_by = Auth::user()->id ?? null;
    }

    public function deleting(Contact $contact): void
    {
        $contact->deleted_by = Auth::user()->id ?? null;
    }

    public function deleted(Contact $contact): void
    {
        $contact->deleted_by = Auth::user()->id ?? null;
    }

    public function restoring(Contact $contact): void
    {
        $contact->deleted_by = null;
    }

    public function restored(Contact $contact): void
    {
        $contact->deleted_by = null;
    }
}
