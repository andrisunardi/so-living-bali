<?php

namespace App\Models;

use App\Observers\DistrictObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

#[ObservedBy([DistrictObserver::class])]
/**
 * @property int $id
 * @property string $name
 * @property bool $is_show
 * @property bool $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \App\Models\User|null $updatedBy
 * @property-read \App\Models\User|null $user
 *
 * @method static Builder<static>|District inactive()
 * @method static Builder<static>|District newModelQuery()
 * @method static Builder<static>|District newQuery()
 * @method static Builder<static>|District notShown()
 * @method static Builder<static>|District onlyTrashed()
 * @method static Builder<static>|District query()
 * @method static Builder<static>|District show()
 * @method static Builder<static>|District whereCreatedAt($value)
 * @method static Builder<static>|District whereCreatedBy($value)
 * @method static Builder<static>|District whereDeletedAt($value)
 * @method static Builder<static>|District whereDeletedBy($value)
 * @method static Builder<static>|District whereId($value)
 * @method static Builder<static>|District whereIsActive($value)
 * @method static Builder<static>|District whereIsShow($value)
 * @method static Builder<static>|District whereName($value)
 * @method static Builder<static>|District whereUpdatedAt($value)
 * @method static Builder<static>|District whereUpdatedBy($value)
 * @method static Builder<static>|District withTrashed(bool $withTrashed = true)
 * @method static Builder<static>|District withoutTrashed()
 *
 * @mixin \Eloquent
 */
class District extends Model
{
    use HasFactory;
    use LogsActivity;
    use SoftDeletes;

    protected $table = 'districts';

    protected $fillable = [
        'name',
        'is_show',
        'is_active',
    ];

    protected $hidden = [];

    protected function casts(): array
    {
        return [
            'name' => 'string',
            'is_show' => 'boolean',
            'is_active' => 'boolean',
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

    public function scopeShow(Builder $query): void
    {
        $query->where('is_show', true);
    }

    public function scopeNotShown(Builder $query): void
    {
        $query->where('is_show', false);
    }

    public function scopeInactive(Builder $query): void
    {
        $query->where('is_active', false);
    }

    // public function properties(): HasMany
    // {
    //     return $this->hasMany(Property::class);
    // }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
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
}
