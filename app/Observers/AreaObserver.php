<?php

namespace App\Observers;

use App\Models\Area;
use Illuminate\Support\Facades\Auth;

class AreaObserver
{
    public function creating(Area $area): void
    {
        $area->created_by = Auth::user()->id ?? null;
    }

    public function created(Area $area): void
    {
        $area->created_by = Auth::user()->id ?? null;
    }

    public function updating(Area $area): void
    {
        $area->updated_by = Auth::user()->id ?? null;
    }

    public function updated(Area $area): void
    {
        $area->updated_by = Auth::user()->id ?? null;
    }

    public function deleting(Area $area): void
    {
        $area->deleted_by = Auth::user()->id ?? null;
    }

    public function deleted(Area $area): void
    {
        $area->deleted_by = Auth::user()->id ?? null;
    }

    public function restoring(Area $area): void
    {
        $area->deleted_by = null;
    }

    public function restored(Area $area): void
    {
        $area->deleted_by = null;
    }
}
