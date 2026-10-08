<?php

namespace App\Models;

use App\Observers\FaqObserver;
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
 * @property string $question
 * @property string|null $question_id
 * @property string|null $question_fr
 * @property string|null $answer
 * @property string|null $answer_id
 * @property string|null $answer_fr
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
 * @property-read string $translate_answer
 * @property-read string $translate_question
 * @property-read User|null $updatedBy
 *
 * @method static Builder<static>|Faq active()
 * @method static \Database\Factories\FaqFactory factory($count = null, $state = [])
 * @method static Builder<static>|Faq inactive()
 * @method static Builder<static>|Faq newModelQuery()
 * @method static Builder<static>|Faq newQuery()
 * @method static Builder<static>|Faq onlyTrashed()
 * @method static Builder<static>|Faq query()
 * @method static Builder<static>|Faq whereAnswer($value)
 * @method static Builder<static>|Faq whereAnswerFr($value)
 * @method static Builder<static>|Faq whereAnswerId($value)
 * @method static Builder<static>|Faq whereCreatedAt($value)
 * @method static Builder<static>|Faq whereCreatedBy($value)
 * @method static Builder<static>|Faq whereDeletedAt($value)
 * @method static Builder<static>|Faq whereDeletedBy($value)
 * @method static Builder<static>|Faq whereId($value)
 * @method static Builder<static>|Faq whereIsActive($value)
 * @method static Builder<static>|Faq whereQuestion($value)
 * @method static Builder<static>|Faq whereQuestionFr($value)
 * @method static Builder<static>|Faq whereQuestionId($value)
 * @method static Builder<static>|Faq whereUpdatedAt($value)
 * @method static Builder<static>|Faq whereUpdatedBy($value)
 * @method static Builder<static>|Faq withTrashed(bool $withTrashed = true)
 * @method static Builder<static>|Faq withoutTrashed()
 *
 * @mixin \Eloquent
 */
#[ObservedBy([FaqObserver::class])]
class Faq extends Model
{
    use HasFactory;
    use LogsActivity;
    use SoftDeletes;

    protected $table = 'faqs';

    protected $fillable = [
        'question',
        'question_id',
        'question_fr',
        'answer',
        'answer_id',
        'answer_fr',
        'is_active',
    ];

    protected $hidden = [];

    protected function casts(): array
    {
        return [
            'question' => 'string',
            'question_id' => 'string',
            'question_fr' => 'string',
            'answer' => 'string',
            'answer_id' => 'string',
            'answer_fr' => 'string',
            'is_active' => 'boolean',
        ];
    }

    public array $translatable = [
        'question',
        'answer',
    ];

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

    public function getTranslateQuestionAttribute(): string
    {
        $locale = App::getLocale();
        $language = [
            'en' => $this->question,
            'id' => $this->question_id,
            'fr' => $this->question_fr,
        ];

        return $language[$locale] ?? $this->question;
    }

    public function getTranslateAnswerAttribute(): string
    {
        $locale = App::getLocale();
        $language = [
            'en' => $this->answer,
            'id' => $this->answer_id,
            'fr' => $this->answer_fr,
        ];

        return $language[$locale] ?? $this->answer;
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
