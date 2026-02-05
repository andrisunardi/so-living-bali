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
 * @property PropertyPriceFlexibility|null $owner_price_flexibility
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
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereBuildingSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereInternetSpeedtest($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereOutdoorAreaSize($value)
 */
	class Property extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $username
 * @property string $password
 * @property string|null $image_url
 * @property bool $is_active
 * @property Carbon|null $email_verified_at
 * @property Carbon|null $phone_verified_at
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
 * @property-read \Illuminate\Database\Eloquent\Collection<int, User> $properties
 * @property-read int|null $properties_count
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
 * @method static Builder<static>|User whereEmailVerifiedAt($value)
 * @method static Builder<static>|User whereId($value)
 * @method static Builder<static>|User whereImageUrl($value)
 * @method static Builder<static>|User whereIsActive($value)
 * @method static Builder<static>|User whereName($value)
 * @method static Builder<static>|User wherePassword($value)
 * @method static Builder<static>|User wherePhone($value)
 * @method static Builder<static>|User wherePhoneVerifiedAt($value)
 * @method static Builder<static>|User whereRememberToken($value)
 * @method static Builder<static>|User whereUpdatedAt($value)
 * @method static Builder<static>|User whereUpdatedBy($value)
 * @method static Builder<static>|User whereUsername($value)
 * @method static Builder<static>|User withTrashed(bool $withTrashed = true)
 * @method static Builder<static>|User withoutPermission($permissions)
 * @method static Builder<static>|User withoutRole($roles, $guard = null)
 * @method static Builder<static>|User withoutTrashed()
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

