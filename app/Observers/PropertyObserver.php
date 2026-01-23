<?php

namespace App\Observers;

use App\Models\Property;
use Illuminate\Support\Facades\Auth;

class PropertyObserver
{
    public function creating(Property $property): void
    {
        $property->created_by = Auth::user()->id ?? null;
    }

    public function created(Property $property): void
    {
        $property->created_by = Auth::user()->id ?? null;
    }

    public function updating(Property $property): void
    {
        $property->updated_by = Auth::user()->id ?? null;
    }

    public function updated(Property $property): void
    {
        $property->updated_by = Auth::user()->id ?? null;
    }

    public function deleting(Property $property): void
    {
        $property->deleted_by = Auth::user()->id ?? null;
    }

    public function deleted(Property $property): void
    {
        $property->deleted_by = Auth::user()->id ?? null;
    }

    public function restoring(Property $property): void
    {
        $property->deleted_by = null;
    }

    public function restored(Property $property): void
    {
        $property->deleted_by = null;
    }
}
