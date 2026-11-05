<?php

namespace App\Observers;

use App\Models\Testimonial;
use Illuminate\Support\Facades\Auth;

class TestimonialObserver
{
    public function creating(Testimonial $testimonial): void
    {
        $testimonial->created_by = Auth::user()->id ?? null;
    }

    public function created(Testimonial $testimonial): void
    {
        $testimonial->created_by = Auth::user()->id ?? null;
    }

    public function updating(Testimonial $testimonial): void
    {
        $testimonial->updated_by = Auth::user()->id ?? null;
    }

    public function updated(Testimonial $testimonial): void
    {
        $testimonial->updated_by = Auth::user()->id ?? null;
    }

    public function deleting(Testimonial $testimonial): void
    {
        $testimonial->deleted_by = Auth::user()->id ?? null;
    }

    public function deleted(Testimonial $testimonial): void
    {
        $testimonial->deleted_by = Auth::user()->id ?? null;
    }

    public function restoring(Testimonial $testimonial): void
    {
        $testimonial->deleted_by = null;
    }

    public function restored(Testimonial $testimonial): void
    {
        $testimonial->deleted_by = null;
    }
}
