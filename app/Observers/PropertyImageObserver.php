<?php

namespace App\Observers;

use App\Models\PropertyImage;
use Illuminate\Support\Facades\Auth;

class PropertyImageObserver
{
    public function creating(PropertyImage $propertyImage): void
    {
        $propertyImage->created_by = Auth::user()->id ?? null;
    }

    public function created(PropertyImage $propertyImage): void
    {
        $propertyImage->created_by = Auth::user()->id ?? null;
    }

    public function updating(PropertyImage $propertyImage): void
    {
        $propertyImage->updated_by = Auth::user()->id ?? null;
    }

    public function updated(PropertyImage $propertyImage): void
    {
        $propertyImage->updated_by = Auth::user()->id ?? null;
    }

    public function deleting(PropertyImage $propertyImage): void
    {
        $propertyImage->deleted_by = Auth::user()->id ?? null;
    }

    public function deleted(PropertyImage $propertyImage): void
    {
        $propertyImage->deleted_by = Auth::user()->id ?? null;
    }

    public function restoring(PropertyImage $propertyImage): void
    {
        $propertyImage->deleted_by = null;
    }

    public function restored(PropertyImage $propertyImage): void
    {
        $propertyImage->deleted_by = null;
    }
}
