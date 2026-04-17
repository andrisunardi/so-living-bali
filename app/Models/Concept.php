<?php

namespace App\Models;

use App\Observers\ConceptObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * @property int $id
 * @property string $title
 * @property string $title_id
 * @property string $title_zh
 * @property string $description
 * @property string $description_id
 * @property string $description_zh
 * @property string $icon
 * @property bool $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Collection<int, Activity> $activities
 * @property-read int|null $activities_count
 * @property-read User|null $createdBy
 * @property-read User|null $deletedBy
 * @property-read string $description_title
 * @property-read string $translate_title
 * @property-read User|null $updatedBy
 *
 * @method static Builder<static>|Concept active()
 * @method static \Database\Factories\ConceptFactory factory($count = null, $state = [])
 * @method static Builder<static>|Concept inactive()
 * @method static Builder<static>|Concept newModelQuery()
 * @method static Builder<static>|Concept newQuery()
 * @method static Builder<static>|Concept onlyTrashed()
 * @method static Builder<static>|Concept query()
 * @method static Builder<static>|Concept whereCreatedAt($value)
 * @method static Builder<static>|Concept whereCreatedBy($value)
 * @method static Builder<static>|Concept whereDeletedAt($value)
 * @method static Builder<static>|Concept whereDeletedBy($value)
 * @method static Builder<static>|Concept whereDescription($value)
 * @method static Builder<static>|Concept whereDescriptionId($value)
 * @method static Builder<static>|Concept whereDescriptionZh($value)
 * @method static Builder<static>|Concept whereIcon($value)
 * @method static Builder<static>|Concept whereId($value)
 * @method static Builder<static>|Concept whereIsActive($value)
 * @method static Builder<static>|Concept whereTitle($value)
 * @method static Builder<static>|Concept whereTitleId($value)
 * @method static Builder<static>|Concept whereTitleZh($value)
 * @method static Builder<static>|Concept whereUpdatedAt($value)
 * @method static Builder<static>|Concept whereUpdatedBy($value)
 * @method static Builder<static>|Concept withTrashed(bool $withTrashed = true)
 * @method static Builder<static>|Concept withoutTrashed()
 *
 * @mixin \Eloquent
 */
#[ObservedBy([ConceptObserver::class])]
class Concept extends Model
{
    use HasFactory;
    use LogsActivity;
    use SoftDeletes;

    protected $table = 'concepts';

    protected $fillable = [
        'title',
        'title_id',
        'title_zh',
        'description',
        'description_id',
        'description_zh',
        'icon',
        'is_active',
    ];

    protected $hidden = [];

    protected function casts(): array
    {
        return [
            'title' => 'string',
            'title_id' => 'string',
            'title_zh' => 'string',
            'description' => 'string',
            'description_id' => 'string',
            'description_zh' => 'string',
            'icon' => 'string',
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

    public function getTranslateTitleAttribute(): string
    {
        $locale = App::getLocale();
        $language = [
            'en' => $this->title,
            'id' => $this->title_id,
            'zh' => $this->title_zh,
        ];

        return $language[$locale] ?? $this->title;
    }

    public function getTranslateDescriptionAttribute(): string
    {
        $locale = App::getLocale();
        $language = [
            'en' => $this->description,
            'id' => $this->description_id,
            'zh' => $this->description_zh,
        ];

        return $language[$locale] ?? $this->description;
    }

    public function scopeActive(Builder $query): void
    {
        $query->where('is_active', true);
    }

    public function scopeInactive(Builder $query): void
    {
        $query->where('is_active', false);
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
