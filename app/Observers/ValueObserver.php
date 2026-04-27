<?php

namespace App\Observers;

use App\Models\Value;
use Illuminate\Support\Facades\Auth;

class ValueObserver
{
    public function creating(Value $value): void
    {
        $value->created_by = Auth::user()->id ?? null;
    }

    public function created(Value $value): void
    {
        $value->created_by = Auth::user()->id ?? null;
    }

    public function updating(Value $value): void
    {
        $value->updated_by = Auth::user()->id ?? null;
    }

    public function updated(Value $value): void
    {
        $value->updated_by = Auth::user()->id ?? null;
    }

    public function deleting(Value $value): void
    {
        $value->deleted_by = Auth::user()->id ?? null;
    }

    public function deleted(Value $value): void
    {
        $value->deleted_by = Auth::user()->id ?? null;
    }

    public function restoring(Value $value): void
    {
        $value->deleted_by = null;
    }

    public function restored(Value $value): void
    {
        $value->deleted_by = null;
    }
}
