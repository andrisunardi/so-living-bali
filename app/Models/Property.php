<?php

namespace App\Models;

use App\Enums\Property\PropertyElectricity;
use App\Enums\Property\PropertyLivingStyle;
use App\Enums\Property\PropertyOperationalRisk;
use App\Enums\Property\PropertyOrientation;
use App\Enums\Property\PropertyOwnerPriceFlexibility;
use App\Enums\Property\PropertyPowerBackup;
use App\Enums\Property\PropertyRentalType;
use App\Enums\Property\PropertyStatus;
use App\Enums\Property\PropertyTargetProfile;
use App\Enums\Property\PropertyWaterSource;
use App\Observers\PropertyObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

#[ObservedBy([PropertyObserver::class])]
/**
 * @property int $id
 * @property string $code
 * @property string $name
 * @property int|null $user_id
 * @property Carbon|null $availability_date
 * @property Carbon|null $visit_date
 * @property numeric|null $latitude
 * @property numeric|null $longitude
 * @property string|null $address
 * @property string|null $area
 * @property int|null $land_size
 * @property int|null $building_size
 * @property int|null $number_of_floors
 * @property int|null $outdoor_area_size
 * @property string|null $pool_size
 * @property bool|null $number_of_bathrooms
 * @property bool $ensuite_bathrooms
 * @property bool $guest_toilet
 * @property bool $storage
 * @property PropertyLivingStyle|null $living_style
 * @property bool $full_legal_documentation
 * @property bool $fully_furnished
 * @property PropertyRentalType|null $rental_type
 * @property int|null $minimum_rental_duration_months
 * @property PropertyOwnerPriceFlexibility|null $owner_price_flexibility
 * @property bool $price_coherent_with_upper
 * @property bool $not_directly_exposed_to_main_road
 * @property bool $no_festive_venue_nearby
 * @property bool $no_ongoing
 * @property bool $quiet_access_road
 * @property PropertyOrientation|null $orientation
 * @property string|null $view
 * @property bool $living_area_has_natural_light
 * @property bool $bedroom_1_has_natural_light
 * @property bool $bedroom_2_has_natural_light
 * @property string|null $noise_source_identified
 * @property int|null $internet_speedtest
 * @property PropertyPowerBackup|null $power_backup
 * @property PropertyWaterSource|null $water_source
 * @property PropertyElectricity|null $electricity
 * @property bool $eligible_for_upper
 * @property bool $eligible_for_premium
 * @property bool $design_driven_property
 * @property string|null $usability_limitations
 * @property bool $trade_off_identified
 * @property string|null $trade_off_description
 * @property PropertyTargetProfile|null $target_profile
 * @property PropertyOperationalRisk|null $operational_risk
 * @property string|null $operational_risk_comment
 * @property PropertyStatus $status
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
 * @method static Builder<static>|Property acceptPremium()
 * @method static Builder<static>|Property acceptUpper()
 * @method static Builder<static>|Property afternoon()
 * @method static Builder<static>|Property both()
 * @method static Builder<static>|Property closed()
 * @method static Builder<static>|Property couple()
 * @method static Builder<static>|Property designLover()
 * @method static Builder<static>|Property eSolar()
 * @method static Builder<static>|Property escalate()
 * @method static \Database\Factories\PropertyFactory factory($count = null, $state = [])
 * @method static Builder<static>|Property family()
 * @method static Builder<static>|Property fixed()
 * @method static Builder<static>|Property generator()
 * @method static Builder<static>|Property high()
 * @method static Builder<static>|Property hybrid()
 * @method static Builder<static>|Property low()
 * @method static Builder<static>|Property medium()
 * @method static Builder<static>|Property mixed()
 * @method static Builder<static>|Property mixedSun()
 * @method static Builder<static>|Property monthly()
 * @method static Builder<static>|Property morning()
 * @method static Builder<static>|Property negotiable()
 * @method static Builder<static>|Property newModelQuery()
 * @method static Builder<static>|Property newQuery()
 * @method static Builder<static>|Property none()
 * @method static Builder<static>|Property onlyTrashed()
 * @method static Builder<static>|Property open()
 * @method static Builder<static>|Property pDAM()
 * @method static Builder<static>|Property pending()
 * @method static Builder<static>|Property query()
 * @method static Builder<static>|Property reject()
 * @method static Builder<static>|Property remoteWorker()
 * @method static Builder<static>|Property solar()
 * @method static Builder<static>|Property standard()
 * @method static Builder<static>|Property wSMixed()
 * @method static Builder<static>|Property well()
 * @method static Builder<static>|Property whereAddress($value)
 * @method static Builder<static>|Property whereArea($value)
 * @method static Builder<static>|Property whereAvailabilityDate($value)
 * @method static Builder<static>|Property whereBedroom1HasNaturalLight($value)
 * @method static Builder<static>|Property whereBedroom2HasNaturalLight($value)
 * @method static Builder<static>|Property whereBuildingSizeSqm($value)
 * @method static Builder<static>|Property whereCode($value)
 * @method static Builder<static>|Property whereCreatedAt($value)
 * @method static Builder<static>|Property whereCreatedBy($value)
 * @method static Builder<static>|Property whereDeletedAt($value)
 * @method static Builder<static>|Property whereDeletedBy($value)
 * @method static Builder<static>|Property whereDesignDrivenProperty($value)
 * @method static Builder<static>|Property whereElectricity($value)
 * @method static Builder<static>|Property whereEligibleForPremium($value)
 * @method static Builder<static>|Property whereEligibleForUpper($value)
 * @method static Builder<static>|Property whereEnsuiteBathrooms($value)
 * @method static Builder<static>|Property whereFullLegalDocumentation($value)
 * @method static Builder<static>|Property whereFullyFurnished($value)
 * @method static Builder<static>|Property whereGuestToilet($value)
 * @method static Builder<static>|Property whereId($value)
 * @method static Builder<static>|Property whereInternetSpeedtestMpbs($value)
 * @method static Builder<static>|Property whereLandSize($value)
 * @method static Builder<static>|Property whereLatitude($value)
 * @method static Builder<static>|Property whereLivingAreaHasNaturalLight($value)
 * @method static Builder<static>|Property whereLivingStyle($value)
 * @method static Builder<static>|Property whereLongitude($value)
 * @method static Builder<static>|Property whereMinimumRentalDurationMonths($value)
 * @method static Builder<static>|Property whereName($value)
 * @method static Builder<static>|Property whereNoFestiveVenueNearby($value)
 * @method static Builder<static>|Property whereNoOngoing($value)
 * @method static Builder<static>|Property whereNoiseSourceIdentified($value)
 * @method static Builder<static>|Property whereNotDirectlyExposedToMainRoad($value)
 * @method static Builder<static>|Property whereNumberOfBathrooms($value)
 * @method static Builder<static>|Property whereNumberOfFloors($value)
 * @method static Builder<static>|Property whereOperationalRisk($value)
 * @method static Builder<static>|Property whereOperationalRiskComment($value)
 * @method static Builder<static>|Property whereOrientation($value)
 * @method static Builder<static>|Property whereOutdoorAreaSizeSqm($value)
 * @method static Builder<static>|Property whereOwnerPriceFlexibility($value)
 * @method static Builder<static>|Property wherePoolSize($value)
 * @method static Builder<static>|Property wherePowerBackup($value)
 * @method static Builder<static>|Property wherePriceCoherentWithUpper($value)
 * @method static Builder<static>|Property whereQuietAccessRoad($value)
 * @method static Builder<static>|Property whereRentalType($value)
 * @method static Builder<static>|Property whereStatus($value)
 * @method static Builder<static>|Property whereStorage($value)
 * @method static Builder<static>|Property whereTargetProfile($value)
 * @method static Builder<static>|Property whereTradeOffDescription($value)
 * @method static Builder<static>|Property whereTradeOffIdentified($value)
 * @method static Builder<static>|Property whereUpdatedAt($value)
 * @method static Builder<static>|Property whereUpdatedBy($value)
 * @method static Builder<static>|Property whereUsabilityLimitations($value)
 * @method static Builder<static>|Property whereUserId($value)
 * @method static Builder<static>|Property whereView($value)
 * @method static Builder<static>|Property whereVisitDate($value)
 * @method static Builder<static>|Property whereWaterSource($value)
 * @method static Builder<static>|Property withTrashed(bool $withTrashed = true)
 * @method static Builder<static>|Property withoutTrashed()
 * @method static Builder<static>|Property yearly()
 * @method static Builder<static>|Property whereBuildingSize($value)
 * @method static Builder<static>|Property whereInternetSpeedtest($value)
 * @method static Builder<static>|Property whereOutdoorAreaSize($value)
 *
 * @property string|null $image_url
 * @property string $slug
 *
 * @method static Builder<static>|Property whereImageUrl($value)
 * @method static Builder<static>|Property whereSlug($value)
 *
 * @mixin \Eloquent
 */
class Property extends Model
{
    use HasFactory;
    use LogsActivity;
    use SoftDeletes;

    protected $table = 'properties';

    protected $fillable = [
        'code',
        'name',
        'user_id',
        'availability_date',
        'visit_date',

        'latitude',
        'longitude',
        'address',
        'area',

        'land_size',
        'building_size',
        'number_of_floors',
        'outdoor_area_size',
        'pool_size',

        'number_of_bathrooms',
        'ensuite_bathrooms',
        'guest_toilet',
        'storage',
        'living_style',

        'full_legal_documentation',
        'fully_furnished',
        'rental_type',
        'minimum_rental_duration_months',
        'owner_price_flexibility',
        'price_coherent_with_upper',

        'not_directly_exposed_to_main_road',
        'no_festive_venue_nearby',
        'no_ongoing',
        'quiet_access_road',
        'orientation',
        'view',

        'living_area_has_natural_light',
        'bedroom_1_has_natural_light',
        'bedroom_2_has_natural_light',
        'noise_source_identified',

        'internet_speedtest',
        'power_backup',
        'water_source',
        'electricity',

        'eligible_for_upper',
        'eligible_for_premium',

        'design_driven_property',
        'usability_limitations',

        'trade_off_identified',
        'trade_off_description',
        'target_profile',

        'operational_risk',
        'operational_risk_comment',

        'image_url',
        'status',
        'slug',
    ];

    protected $hidden = [];

    protected function casts(): array
    {
        return [
            'code' => 'string',
            'name' => 'string',
            'user_id' => 'integer',
            'availability_date' => 'date',
            'visit_date' => 'date',

            'latitude' => 'decimal:7',
            'longitude' => 'decimal:7',
            'address' => 'string',
            'area' => 'string',

            'land_size' => 'integer',
            'building_size' => 'integer',
            'number_of_floors' => 'integer',
            'outdoor_area_size' => 'integer',
            'pool_size' => 'string',

            'number_of_bathrooms' => 'boolean',
            'ensuite_bathrooms' => 'boolean',
            'guest_toilet' => 'boolean',
            'storage' => 'boolean',
            'living_style' => PropertyLivingStyle::class,

            'full_legal_documentation' => 'boolean',
            'fully_furnished' => 'boolean',
            'rental_type' => PropertyRentalType::class,
            'minimum_rental_duration_months' => 'integer',
            'owner_price_flexibility' => PropertyOwnerPriceFlexibility::class,
            'price_coherent_with_upper' => 'boolean',

            'not_directly_exposed_to_main_road' => 'boolean',
            'no_festive_venue_nearby' => 'boolean',
            'no_ongoing' => 'boolean',
            'quiet_access_road' => 'boolean',
            'orientation' => PropertyOrientation::class,
            'view' => 'string',

            'living_area_has_natural_light' => 'boolean',
            'bedroom_1_has_natural_light' => 'boolean',
            'bedroom_2_has_natural_light' => 'boolean',
            'noise_source_identified' => 'string',

            'internet_speedtest' => 'integer',
            'power_backup' => PropertyPowerBackup::class,
            'water_source' => PropertyWaterSource::class,
            'electricity' => PropertyElectricity::class,

            'eligible_for_upper' => 'boolean',
            'eligible_for_premium' => 'boolean',

            'design_driven_property' => 'boolean',
            'usability_limitations' => 'string',

            'trade_off_identified' => 'boolean',
            'trade_off_description' => 'string',
            'target_profile' => PropertyTargetProfile::class,

            'operational_risk' => PropertyOperationalRisk::class,
            'operational_risk_comment' => 'string',

            'image_url' => 'string',
            'status' => PropertyStatus::class,
            'slug' => 'string',
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

    public function scopeOpen(Builder $query): void
    {
        $query->where('living_style', PropertyLivingStyle::Open);
    }

    public function scopeClosed(Builder $query): void
    {
        $query->where('living_style', PropertyLivingStyle::Closed);
    }

    public function scopeMixed(Builder $query): void
    {
        $query->where('living_style', PropertyLivingStyle::Mixed);
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

    public function scopeFixed(Builder $query): void
    {
        $query->where('price_flexibility', PropertyOwnerPriceFlexibility::Fixed);
    }

    public function scopeNegotiable(Builder $query): void
    {
        $query->where('price_flexibility', PropertyOwnerPriceFlexibility::Negotiable);
    }

    public function scopeMorning(Builder $query): void
    {
        $query->where('orientation', PropertyOrientation::Morning);
    }

    public function scopeAfternoon(Builder $query): void
    {
        $query->where('orientation', PropertyOrientation::Afternoon);
    }

    public function scopeMixedSun(Builder $query): void
    {
        $query->where('orientation', PropertyOrientation::MixedSun);
    }

    public function scopeGenerator(Builder $query): void
    {
        $query->where('power_backup', PropertyPowerBackup::Generator);
    }

    public function scopeSolar(Builder $query): void
    {
        $query->where('power_backup', PropertyPowerBackup::Solar);
    }

    public function scopeNone(Builder $query): void
    {
        $query->where('power_backup', PropertyPowerBackup::None);
    }

    public function scopePDAM(Builder $query): void
    {
        $query->where('water_source', PropertyWaterSource::PDAM);
    }

    public function scopeWell(Builder $query): void
    {
        $query->where('water_source', PropertyWaterSource::Well);
    }

    public function scopeWSMixed(Builder $query): void
    {
        $query->where('water_source', PropertyWaterSource::Mixed);
    }

    public function scopeStandard(Builder $query): void
    {
        $query->where('electricity', PropertyElectricity::Standard);
    }

    public function scopeESolar(Builder $query): void
    {
        $query->where('electricity', PropertyElectricity::Solar);
    }

    public function scopeHybrid(Builder $query): void
    {
        $query->where('electricity', PropertyElectricity::Hybrid);
    }

    public function scopeFamily(Builder $query): void
    {
        $query->where('target_profile', PropertyTargetProfile::Family);
    }

    public function scopeCouple(Builder $query): void
    {
        $query->where('target_profile', PropertyTargetProfile::Couple);
    }

    public function scopeRemoteWorker(Builder $query): void
    {
        $query->where('target_profile', PropertyTargetProfile::RemoteWorker);
    }

    public function scopeDesignLover(Builder $query): void
    {
        $query->where('target_profile', PropertyTargetProfile::DesignLover);
    }

    public function scopeLow(Builder $query): void
    {
        $query->where('operational_risk', PropertyOperationalRisk::Low);
    }

    public function scopeMedium(Builder $query): void
    {
        $query->where('operational_risk', PropertyOperationalRisk::Medium);
    }

    public function scopeHigh(Builder $query): void
    {
        $query->where('operational_risk', PropertyOperationalRisk::High);
    }

    public function scopePending(Builder $query): void
    {
        $query->where('status', PropertyStatus::Pending);
    }

    public function scopeAcceptUpper(Builder $query): void
    {
        $query->where('status', PropertyStatus::AcceptUpper);
    }

    public function scopeAcceptPremium(Builder $query): void
    {
        $query->where('status', PropertyStatus::AcceptPremium);
    }

    public function scopeReject(Builder $query): void
    {
        $query->where('status', PropertyStatus::Reject);
    }

    public function scopeEscalate(Builder $query): void
    {
        $query->where('status', PropertyStatus::Escalate);
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
