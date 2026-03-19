<?php

namespace App\Observers;

use App\Models\Oauth;
use Illuminate\Support\Facades\Auth;

class OauthObserver
{
    public function creating(Oauth $oauth): void
    {
        $oauth->created_by = Auth::user()->id ?? null;
    }

    public function created(Oauth $oauth): void
    {
        $oauth->created_by = Auth::user()->id ?? null;
    }

    public function updating(Oauth $oauth): void
    {
        $oauth->updated_by = Auth::user()->id ?? null;
    }

    public function updated(Oauth $oauth): void
    {
        $oauth->updated_by = Auth::user()->id ?? null;
    }

    public function deleting(Oauth $oauth): void
    {
        $oauth->deleted_by = Auth::user()->id ?? null;
    }

    public function deleted(Oauth $oauth): void
    {
        $oauth->deleted_by = Auth::user()->id ?? null;
    }

    public function restoring(Oauth $oauth): void
    {
        $oauth->deleted_by = null;
    }

    public function restored(Oauth $oauth): void
    {
        $oauth->deleted_by = null;
    }
}
