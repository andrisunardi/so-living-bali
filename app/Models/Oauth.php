<?php

namespace App\Models;

use App\Observers\OauthObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $refresh_token
 * @property string $access_token
 * @property string $token_type
 * @property int $expires_in
 * @property string $scope
 * @property int $created
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
 * @property-read User|null $updatedBy
 *
 * @method static \Database\Factories\OauthFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Oauth newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Oauth newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Oauth onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Oauth query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Oauth whereAccessToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Oauth whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Oauth whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Oauth whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Oauth whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Oauth whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Oauth whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Oauth whereExpiresIn($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Oauth whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Oauth whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Oauth whereRefreshToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Oauth whereScope($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Oauth whereTokenType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Oauth whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Oauth whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Oauth withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Oauth withoutTrashed()
 *
 * @mixin \Eloquent
 */
#[ObservedBy([OauthObserver::class])]
class Oauth extends Model
{
    use HasFactory;
    use LogsActivity;
    use SoftDeletes;

    protected $table = 'oauths';

    protected $fillable = [
        'code',
        'name',
        'refresh_token',
        'access_token',
        'token_type',
        'expires_in',
        'scope',
        'created',
    ];

    protected $hidden = [];

    protected function casts(): array
    {
        return [
            'code' => 'string',
            'name' => 'string',
            'refresh_token' => 'string',
            'access_token' => 'string',
            'token_type' => 'string',
            'expires_in' => 'integer',
            'scope' => 'string',
            'created' => 'integer',
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
