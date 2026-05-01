<?php

namespace App\Models;

use App\Enums\Property\PropertyBedroom;
use App\Enums\Property\PropertyRentalType;
use App\Observers\ContactObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

#[ObservedBy([ContactObserver::class])]
class Contact extends Model
{
    use HasFactory;
    use LogsActivity;
    use SoftDeletes;

    protected $table = 'contacts';

    protected $fillable = [
        'code',
        'name',
        'first_name',
        'last_name',
        'company',
        'phone',
        'email',
        'area_id',
        'bedroom',
        'rental_type',
        'message',
    ];

    protected $hidden = [];

    protected function casts(): array
    {
        return [
            'code' => 'string',
            'name' => 'string',
            'first_name' => 'string',
            'last_name' => 'string',
            'company' => 'string',
            'email' => 'string',
            'phone' => 'string',
            'area_id' => 'integer',
            'bedroom' => PropertyBedroom::class,
            'rental_type' => PropertyRentalType::class,
            'message' => 'string',
        ];
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName($this->table)
            ->logFillable()
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn (string $eventName) => ":subject.name has been {$eventName} by :causer.name");
    }

    public function getCreatedAtAttribute(string $value): Carbon
    {
        return Carbon::parse($value)->setTimezone(config('app.timezone'));
    }

    public function getUpdatedAtAttribute(string $value): Carbon
    {
        return Carbon::parse($value)->setTimezone(config('app.timezone'));
    }

    public function scopeOneBedroom(Builder $query): void
    {
        $query->where('bedroom', PropertyBedroom::OneBedroom);
    }

    public function scopeTwoBedroom(Builder $query): void
    {
        $query->where('bedroom', PropertyBedroom::TwoBedroom);
    }

    public function scopeThreeBedroom(Builder $query): void
    {
        $query->where('bedroom', PropertyBedroom::ThreeBedroom);
    }

    public function scopeFourBedroom(Builder $query): void
    {
        $query->where('bedroom', PropertyBedroom::FourBedroom);
    }

    public function scopeMonthly(Builder $query): void
    {
        $query->where('rental_type', PropertyRentalType::Monthly);
    }

    public function scopeYearly(Builder $query): void
    {
        $query->where('rental_type', PropertyRentalType::Yearly);
    }

    public function scopeBoth(Builder $query): void
    {
        $query->where('rental_type', PropertyRentalType::Both);
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function deletedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }

    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }

    public function district(): HasOne
    {
        return $this->hasOne(District::class, Area::class);
    }
}
