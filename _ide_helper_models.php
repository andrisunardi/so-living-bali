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
 * @property-read Collection<int, Activity> $activities
 * @property-read int|null $activities_count
 * @property-read Collection<int, Contact> $contacts
 * @property-read int|null $contacts_count
 * @property-read User|null $createdBy
 * @property-read User|null $deletedBy
 * @property-read District|null $district
 * @property-read Collection<int, Property> $properties
 * @property-read int|null $properties_count
 * @property-read User|null $updatedBy
 * @property-read User|null $user
 * @method static Builder<static>|Area active()
 * @method static \Database\Factories\AreaFactory factory($count = null, $state = [])
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
 * @mixin \Eloquent
 */
	class Area extends \Eloquent {}
}

namespace App\Models{
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
 * @property-read string $translate_description
 * @mixin \Eloquent
 */
	class Concept extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $company
 * @property string $email
 * @property string $phone
 * @property int|null $area_id
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Collection<int, Activity> $activities
 * @property-read int|null $activities_count
 * @property-read Area|null $area
 * @property-read User|null $createdBy
 * @property-read User|null $deletedBy
 * @property-read District|null $district
 * @property-read User|null $updatedBy
 * @method static \Database\Factories\ContactFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact whereAreaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Contact whereCompany($value)
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
 * @mixin \Eloquent
 */
	class Contact extends \Eloquent {}
}

namespace App\Models{
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
 * @property-read Collection<int, Activity> $activities
 * @property-read int|null $activities_count
 * @property-read Collection<int, Area> $areas
 * @property-read int|null $areas_count
 * @property-read User|null $createdBy
 * @property-read User|null $deletedBy
 * @property-read Collection<int, Property> $properties
 * @property-read int|null $properties_count
 * @property-read User|null $updatedBy
 * @property-read User|null $user
 * @method static Builder<static>|District active()
 * @method static \Database\Factories\DistrictFactory factory($count = null, $state = [])
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
 * @property-read Collection<int, Contact> $contacts
 * @property-read int|null $contacts_count
 * @mixin \Eloquent
 */
	class District extends \Eloquent {}
}

namespace App\Models{
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
 * @mixin \Eloquent
 */
	class Oauth extends \Eloquent {}
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
 * @property int|null $district_id
 * @property int|null $area_id
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
 * @property string|null $internet_speedtest_image_path
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
 * @property string|null $image_path
 * @property PropertyStatus $status
 * @property string $slug
 * @property string|null $folder_id
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Collection<int, Activity> $activities
 * @property-read int|null $activities_count
 * @property-read Area|null $area
 * @property-read User|null $createdBy
 * @property-read User|null $deletedBy
 * @property-read District|null $district
 * @property-read string $image
 * @property-read string $internet_speedtest_image
 * @property-read Property|null $images
 * @property-read User|null $updatedBy
 * @property-read User|null $user
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
 * @method static Builder<static>|Property whereAreaId($value)
 * @method static Builder<static>|Property whereAvailabilityDate($value)
 * @method static Builder<static>|Property whereBedroom1HasNaturalLight($value)
 * @method static Builder<static>|Property whereBedroom2HasNaturalLight($value)
 * @method static Builder<static>|Property whereBuildingSize($value)
 * @method static Builder<static>|Property whereCode($value)
 * @method static Builder<static>|Property whereCreatedAt($value)
 * @method static Builder<static>|Property whereCreatedBy($value)
 * @method static Builder<static>|Property whereDeletedAt($value)
 * @method static Builder<static>|Property whereDeletedBy($value)
 * @method static Builder<static>|Property whereDesignDrivenProperty($value)
 * @method static Builder<static>|Property whereDistrictId($value)
 * @method static Builder<static>|Property whereElectricity($value)
 * @method static Builder<static>|Property whereEligibleForPremium($value)
 * @method static Builder<static>|Property whereEligibleForUpper($value)
 * @method static Builder<static>|Property whereEnsuiteBathrooms($value)
 * @method static Builder<static>|Property whereFolderId($value)
 * @method static Builder<static>|Property whereFullLegalDocumentation($value)
 * @method static Builder<static>|Property whereFullyFurnished($value)
 * @method static Builder<static>|Property whereGuestToilet($value)
 * @method static Builder<static>|Property whereId($value)
 * @method static Builder<static>|Property whereImagePath($value)
 * @method static Builder<static>|Property whereInternetSpeedtest($value)
 * @method static Builder<static>|Property whereInternetSpeedtestImagePath($value)
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
 * @method static Builder<static>|Property whereOutdoorAreaSize($value)
 * @method static Builder<static>|Property whereOwnerPriceFlexibility($value)
 * @method static Builder<static>|Property wherePoolSize($value)
 * @method static Builder<static>|Property wherePowerBackup($value)
 * @method static Builder<static>|Property wherePriceCoherentWithUpper($value)
 * @method static Builder<static>|Property whereQuietAccessRoad($value)
 * @method static Builder<static>|Property whereRentalType($value)
 * @method static Builder<static>|Property whereSlug($value)
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
 */
	class Property extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $property_id
 * @property string $name
 * @property string|null $description
 * @property string|null $image_path
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
 * @property-read string $image
 * @property-read Property|null $property
 * @property-read User|null $updatedBy
 * @method static \Database\Factories\PropertyImageFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PropertyImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PropertyImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PropertyImage onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PropertyImage query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PropertyImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PropertyImage whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PropertyImage whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PropertyImage whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PropertyImage whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PropertyImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PropertyImage whereImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PropertyImage whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PropertyImage wherePropertyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PropertyImage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PropertyImage whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PropertyImage withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PropertyImage withoutTrashed()
 * @mixin \Eloquent
 */
	class PropertyImage extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $username
 * @property string $password
 * @property string|null $image_path
 * @property bool $is_active
 * @property string|null $google_refresh_token
 * @property Carbon|null $email_verified_at
 * @property Carbon|null $phone_verified_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property string|null $remember_token
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Collection<int, Activity> $activities
 * @property-read int|null $activities_count
 * @property-read User|null $createdBy
 * @property-read User|null $deletedBy
 * @property-read Collection<int, Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read Collection<int, Property> $properties
 * @property-read int|null $properties_count
 * @property-read Collection<int, Role> $roles
 * @property-read int|null $roles_count
 * @property-read Collection<int, PersonalAccessToken> $tokens
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
 * @method static Builder<static>|User whereGoogleRefreshToken($value)
 * @method static Builder<static>|User whereId($value)
 * @method static Builder<static>|User whereImagePath($value)
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

