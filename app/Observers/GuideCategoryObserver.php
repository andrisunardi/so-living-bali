<?php

namespace App\Observers;

use App\Models\GuideCategory;
use Illuminate\Support\Facades\Auth;

class GuideCategoryObserver
{
    public function creating(GuideCategory $guideCategory): void
    {
        $guideCategory->created_by = Auth::user()->id ?? null;
    }

    public function created(GuideCategory $guideCategory): void
    {
        $guideCategory->created_by = Auth::user()->id ?? null;
    }

    public function updating(GuideCategory $guideCategory): void
    {
        $guideCategory->updated_by = Auth::user()->id ?? null;
    }

    public function updated(GuideCategory $guideCategory): void
    {
        $guideCategory->updated_by = Auth::user()->id ?? null;
    }

    public function deleting(GuideCategory $guideCategory): void
    {
        $guideCategory->deleted_by = Auth::user()->id ?? null;
    }

    public function deleted(GuideCategory $guideCategory): void
    {
        $guideCategory->deleted_by = Auth::user()->id ?? null;
    }

    public function restoring(GuideCategory $guideCategory): void
    {
        $guideCategory->deleted_by = null;
    }

    public function restored(GuideCategory $guideCategory): void
    {
        $guideCategory->deleted_by = null;
    }
}
