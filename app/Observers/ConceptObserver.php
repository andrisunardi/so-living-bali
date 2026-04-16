<?php

namespace App\Observers;

use App\Models\Concept;
use Illuminate\Support\Facades\Auth;

class ConceptObserver
{
    public function creating(Concept $concept): void
    {
        $concept->created_by = Auth::user()->id ?? null;
    }

    public function created(Concept $concept): void
    {
        $concept->created_by = Auth::user()->id ?? null;
    }

    public function updating(Concept $concept): void
    {
        $concept->updated_by = Auth::user()->id ?? null;
    }

    public function updated(Concept $concept): void
    {
        $concept->updated_by = Auth::user()->id ?? null;
    }

    public function deleting(Concept $concept): void
    {
        $concept->deleted_by = Auth::user()->id ?? null;
    }

    public function deleted(Concept $concept): void
    {
        $concept->deleted_by = Auth::user()->id ?? null;
    }

    public function restoring(Concept $concept): void
    {
        $concept->deleted_by = null;
    }

    public function restored(Concept $concept): void
    {
        $concept->deleted_by = null;
    }
}
