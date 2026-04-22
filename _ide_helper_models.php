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
 * @property string $first_name
 * @property string $last_name
 * @property string $company
 * @property string $email
 * @property string $phone
 * @property PropertyBedroom|null $bedroom
 * @property PropertyRentalType|null $rental_type
 * @property string|null $message
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
 * @method static Builder<static>|Contact both()
 * @method static \Database\Factories\ContactFactory factory($count = null, $state = [])
 * @method static Builder<static>|Contact fourBedroom()
 * @method static Builder<static>|Contact monthly()
 * @method static Builder<static>|Contact newModelQuery()
 * @method static Builder<static>|Contact newQuery()
 * @method static Builder<static>|Contact oneBedroom()
 * @method static Builder<static>|Contact onlyTrashed()
 * @method static Builder<static>|Contact query()
 * @method static Builder<static>|Contact studio()
 * @method static Builder<static>|Contact threeBedroom()
 * @method static Builder<static>|Contact twoBedroom()
 * @method static Builder<static>|Contact whereAreaId($value)
 * @method static Builder<static>|Contact whereBedroom($value)
 * @method static Builder<static>|Contact whereCode($value)
 * @method static Builder<static>|Contact whereCompany($value)
 * @method static Builder<static>|Contact whereCreatedAt($value)
 * @method static Builder<static>|Contact whereCreatedBy($value)
 * @method static Builder<static>|Contact whereDeletedAt($value)
 * @method static Builder<static>|Contact whereDeletedBy($value)
 * @method static Builder<static>|Contact whereEmail($value)
 * @method static Builder<static>|Contact whereFirstName($value)
 * @method static Builder<static>|Contact whereId($value)
 * @method static Builder<static>|Contact whereLastName($value)
 * @method static Builder<static>|Contact whereMessage($value)
 * @method static Builder<static>|Contact whereName($value)
 * @method static Builder<static>|Contact wherePhone($value)
 * @method static Builder<static>|Contact whereRentalType($value)
 * @method static Builder<static>|Contact whereUpdatedAt($value)
 * @method static Builder<static>|Contact whereUpdatedBy($value)
 * @method static Builder<static>|Contact withTrashed(bool $withTrashed = true)
 * @method static Builder<static>|Contact withoutTrashed()
 * @method static Builder<static>|Contact yearly()
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
 * @property \Illuminate\Support\Carbon|null $availability_date
 * @property \Illuminate\Support\Carbon|null $visit_date
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
 * @property \App\Enums\Property\PropertyLivingStyle|null $living_style
 * @property bool $full_legal_documentation
 * @property bool $signed_listing_agreement
 * @property bool $lease_agreement
 * @property bool $land_certificate
 * @property bool $owners_id
 * @property bool $imb
 * @property bool $pbg
 * @property bool $slf
 * @property bool $fully_furnished
 * @property \App\Enums\Property\PropertyRentalType|null $rental_type
 * @property int|null $minimum_rental_duration_months
 * @property \App\Enums\Property\PropertyOwnerPriceFlexibility|null $owner_price_flexibility
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
 * @property int|null $internet_speedtest
 * @property string|null $internet_speedtest_image_path
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
 * @property string|null $image_path
 * @property \App\Enums\Property\PropertyStatus $status
 * @property string $slug
 * @property string|null $folder_id
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\Area|null $area
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \App\Models\District|null $district
 * @property-read string $image
 * @property-read string $internet_speedtest_image
 * @property-read Property|null $images
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
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereAreaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereAvailabilityDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereBedroom1HasNaturalLight($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereBedroom2HasNaturalLight($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereBuildingSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereDesignDrivenProperty($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereDistrictId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereElectricity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereEligibleForPremium($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereEligibleForUpper($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereEnsuiteBathrooms($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereFolderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereFullLegalDocumentation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereFullyFurnished($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereGuestToilet($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereImb($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereInternetSpeedtest($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereInternetSpeedtestImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereLandCertificate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereLandSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereLeaseAgreement($value)
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
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereOutdoorAreaSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereOwnerPriceFlexibility($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereOwnersId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property wherePbg($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property wherePoolSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property wherePowerBackup($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property wherePriceCoherentWithUpper($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereQuietAccessRoad($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereRentalType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereSignedListingAgreement($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereSlf($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Property whereSlug($value)
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

