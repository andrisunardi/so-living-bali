<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property string|null $code
 * @property string $name
 * @property string $company
 * @property string $email
 * @property string $phone
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
 * @method static \Database\Factories\ContactFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact whereContactId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact withoutTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact whereCode($value)
 * @mixin \Eloquent
 */
	class Contact extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $code
 * @property string $name
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $availability_date
 * @property \Illuminate\Support\Carbon|null $visit_date
 * @property numeric|null $latitude
 * @property numeric|null $longitude
 * @property string|null $address
 * @property string|null $area
 * @property int|null $land_size
 * @property int|null $building_size_sqm
 * @property int|null $number_of_floors
 * @property int|null $outdoor_area_size_sqm
 * @property string|null $pool_size
 * @property bool|null $number_of_bathrooms
 * @property bool $ensuite_bathrooms
 * @property bool $guest_toilet
 * @property bool $storage
 * @property \App\Enums\Property\PropertyLivingStyle|null $living_style
 * @property bool $full_legal_documentation
 * @property bool $fully_furnished
 * @property \App\Enums\Property\PropertyRentalType|null $rental_type
 * @property int|null $minimum_rental_duration_months
 * @property \App\Enums\Property\PropertyPriceFlexibility|null $owner_price_flexibility
 * @property bool $price_coherent_with_upper
 * @property bool $not_directly_exposed_to_main_road
 * @property bool $no_festive_venue_nearby
 * @property bool $no_ongoing
 * @property bool $quiet_access_road
 * @property \App\Enums\Property\PropertyOrientation|null $orientation
 * @property string|null $view
 * @property bool $living_area_has_natural_light
 * @property bool $bedroom_1_has_natural_light
 * @property bool $bedroom_2_has_natural_light
 * @property string|null $noise_source_identified
 * @property int|null $internet_speedtest_mpbs
 * @property \App\Enums\Property\PropertyPowerBackup|null $power_backup
 * @property \App\Enums\Property\PropertyWaterSource|null $water_source
 * @property \App\Enums\Property\PropertyElectricity|null $electricity
 * @property bool $eligible_for_upper
 * @property bool $eligible_for_premium
 * @property bool $design_driven_property
 * @property string|null $usability_limitations
 * @property bool $trade_off_identified
 * @property string|null $trade_off_description
 * @property \App\Enums\Property\PropertyTargetProfile|null $target_profile
 * @property \App\Enums\Property\PropertyOperationalRisk|null $operational_risk
 * @property string|null $operational_risk_comment
 * @property \App\Enums\Property\PropertyStatus $status
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \App\Models\User|null $updatedBy
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property acceptPremium()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property acceptUpper()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property afternoon()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property both()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property closed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property couple()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property designLover()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property eSolar()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property escalate()
 * @method static \Database\Factories\PropertyFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property family()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property fixed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property generator()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property high()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property hybrid()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property low()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property medium()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property mixed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property mixedSun()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property monthly()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property morning()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property negotiable()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property none()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property open()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property pDAM()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property pending()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property reject()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property remoteWorker()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property solar()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property standard()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property wSMixed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property well()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereAvailabilityDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereBedroom1HasNaturalLight($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereBedroom2HasNaturalLight($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereBuildingSizeSqm($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereDesignDrivenProperty($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereElectricity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereEligibleForPremium($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereEligibleForUpper($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereEnsuiteBathrooms($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereFullLegalDocumentation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereFullyFurnished($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereGuestToilet($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereInternetSpeedtestMpbs($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereLandSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereLivingAreaHasNaturalLight($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereLivingStyle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereMinimumRentalDurationMonths($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereNoFestiveVenueNearby($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereNoOngoing($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereNoiseSourceIdentified($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereNotDirectlyExposedToMainRoad($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereNumberOfBathrooms($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereNumberOfFloors($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereOperationalRisk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereOperationalRiskComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereOrientation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereOutdoorAreaSizeSqm($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereOwnerPriceFlexibility($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property wherePoolSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property wherePowerBackup($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property wherePriceCoherentWithUpper($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereQuietAccessRoad($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereRentalType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereStorage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereTargetProfile($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereTradeOffDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereTradeOffIdentified($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereUsabilityLimitations($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereView($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereVisitDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereWaterSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property withoutTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property yearly()
 */
	class Property extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string|null $phone
 * @property string|null $email
 * @property bool $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property string|null $remember_token
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read User|null $createdBy
 * @property-read User|null $deletedBy
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read User|null $updatedBy
 * @method static Builder<static>|User active()
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static Builder<static>|User inactive()
 * @method static Builder<static>|User newModelQuery()
 * @method static Builder<static>|User newQuery()
 * @method static Builder<static>|User onlyTrashed()
 * @method static Builder<static>|User permission($permissions, $without = false)
 * @method static Builder<static>|User query()
 * @method static Builder<static>|User role($roles, $guard = null, $without = false)
 * @method static Builder<static>|User whereCreatedAt($value)
 * @method static Builder<static>|User whereCreatedBy($value)
 * @method static Builder<static>|User whereDeletedAt($value)
 * @method static Builder<static>|User whereDeletedBy($value)
 * @method static Builder<static>|User whereEmail($value)
 * @method static Builder<static>|User whereId($value)
 * @method static Builder<static>|User whereIsActive($value)
 * @method static Builder<static>|User whereName($value)
 * @method static Builder<static>|User wherePhone($value)
 * @method static Builder<static>|User whereRememberToken($value)
 * @method static Builder<static>|User whereUpdatedAt($value)
 * @method static Builder<static>|User whereUpdatedBy($value)
 * @method static Builder<static>|User withTrashed(bool $withTrashed = true)
 * @method static Builder<static>|User withoutPermission($permissions)
 * @method static Builder<static>|User withoutRole($roles, $guard = null)
 * @method static Builder<static>|User withoutTrashed()
 * @property string $username
 * @property string $password
 * @property string|null $image_url
 * @property Carbon|null $email_verified_at
 * @property Carbon|null $phone_verified_at
 * @method static Builder<static>|User whereEmailVerifiedAt($value)
 * @method static Builder<static>|User whereImageUrl($value)
 * @method static Builder<static>|User wherePassword($value)
 * @method static Builder<static>|User wherePhoneVerifiedAt($value)
 * @method static Builder<static>|User whereUsername($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

