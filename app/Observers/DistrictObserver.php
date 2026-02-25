<?php

namespace App\Observers;

use App\Models\District;
use Illuminate\Support\Facades\Auth;

class DistrictObserver
{
    public function creating(District $district): void
    {
        $district->created_by = Auth::user()->id ?? null;
    }

    public function created(District $district): void
    {
        $district->created_by = Auth::user()->id ?? null;
    }

    public function updating(District $district): void
    {
        $district->updated_by = Auth::user()->id ?? null;
    }

    public function updated(District $district): void
    {
        $district->updated_by = Auth::user()->id ?? null;
    }

    public function deleting(District $district): void
    {
        $district->deleted_by = Auth::user()->id ?? null;
    }

    public function deleted(District $district): void
    {
        $district->deleted_by = Auth::user()->id ?? null;
    }

    public function restoring(District $district): void
    {
        $district->deleted_by = null;
    }

    public function restored(District $district): void
    {
        $district->deleted_by = null;
    }
}
