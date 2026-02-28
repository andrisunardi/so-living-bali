<?php

namespace App\Models;

use App\Observers\AreaObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

#[ObservedBy([AreaObserver::class])]
/**
 * @property int $id
 * @property int $district_id
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
 * @property-read \App\Models\District $district
 * @property-read \App\Models\User|null $updatedBy
 * @property-read \App\Models\User|null $user
 *
 * @method static Builder<static>|Area inactive()
 * @method static Builder<static>|Area newModelQuery()
 * @method static Builder<static>|Area newQuery()
 * @method static Builder<static>|Area notShown()
 * @method static Builder<static>|Area onlyTrashed()
 * @method static Builder<static>|Area query()
 * @method static Builder<static>|Area show()
 * @method static Builder<static>|Area whereCreatedAt($value)
 * @method static Builder<static>|Area whereCreatedBy($value)
 * @method static Builder<static>|Area whereDeletedAt($value)
 * @method static Builder<static>|Area whereDeletedBy($value)
 * @method static Builder<static>|Area whereDistrictId($value)
 * @method static Builder<static>|Area whereId($value)
 * @method static Builder<static>|Area whereIsActive($value)
 * @method static Builder<static>|Area whereIsShow($value)
 * @method static Builder<static>|Area whereName($value)
 * @method static Builder<static>|Area whereUpdatedAt($value)
 * @method static Builder<static>|Area whereUpdatedBy($value)
 * @method static Builder<static>|Area withTrashed(bool $withTrashed = true)
 * @method static Builder<static>|Area withoutTrashed()
 * @method static \Database\Factories\AreaFactory factory($count = null, $state = [])
 *
 * @mixin \Eloquent
 */
class Area extends Model
{
    use HasFactory;
    use LogsActivity;
    use SoftDeletes;

    protected $table = 'areas';

    protected $fillable = [
        'district_id',
        'name',
        'is_show',
        'is_active',
    ];

    protected $hidden = [];

    protected function casts(): array
    {
        return [
            'district_id' => 'integer',
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

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

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
