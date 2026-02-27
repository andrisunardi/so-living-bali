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
 * @property int $outlet_id
 * @property string $title
 * @property string|null $description
 * @property string|null $image_url
 * @property \Illuminate\Support\Carbon|null $start_date
 * @property \Illuminate\Support\Carbon|null $end_date
 * @property string|null $button_name
 * @property string|null $link
 * @property int $is_home
 * @property bool $is_active
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
 * @property-read \App\Models\Outlet $outlet
 * @property-read \App\Models\User|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Announcement active()
 * @method static \Database\Factories\AnnouncementFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Announcement inactive()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Announcement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Announcement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Announcement onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Announcement query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Announcement whereButtonName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Announcement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Announcement whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Announcement whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Announcement whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Announcement whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Announcement whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Announcement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Announcement whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Announcement whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Announcement whereIsHome($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Announcement whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Announcement whereOutletId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Announcement whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Announcement whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Announcement whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Announcement whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Announcement withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Announcement withoutTrashed()
 */
	class Announcement extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int|null $outlet_id
 * @property string $name
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
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Nationality> $nationalities
 * @property-read int|null $nationalities_count
 * @property-read \App\Models\Outlet|null $outlet
 * @property-read \App\Models\User|null $updatedBy
 * @method static Builder<static>|ContactSubject active()
 * @method static \Database\Factories\ContactSubjectFactory factory($count = null, $state = [])
 * @method static Builder<static>|ContactSubject inactive()
 * @method static Builder<static>|ContactSubject newModelQuery()
 * @method static Builder<static>|ContactSubject newQuery()
 * @method static Builder<static>|ContactSubject onlyTrashed()
 * @method static Builder<static>|ContactSubject query()
 * @method static Builder<static>|ContactSubject whereCreatedAt($value)
 * @method static Builder<static>|ContactSubject whereCreatedBy($value)
 * @method static Builder<static>|ContactSubject whereDeletedAt($value)
 * @method static Builder<static>|ContactSubject whereDeletedBy($value)
 * @method static Builder<static>|ContactSubject whereId($value)
 * @method static Builder<static>|ContactSubject whereIsActive($value)
 * @method static Builder<static>|ContactSubject whereName($value)
 * @method static Builder<static>|ContactSubject whereOutletId($value)
 * @method static Builder<static>|ContactSubject whereUpdatedAt($value)
 * @method static Builder<static>|ContactSubject whereUpdatedBy($value)
 * @method static Builder<static>|ContactSubject withTrashed(bool $withTrashed = true)
 * @method static Builder<static>|ContactSubject withoutTrashed()
 * @mixin \Eloquent
 */
	class ContactSubject extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
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
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Nationality> $nationalities
 * @property-read int|null $nationalities_count
 * @property-read \App\Models\User|null $updatedBy
 * @method static Builder<static>|Continent active()
 * @method static \Database\Factories\ContinentFactory factory($count = null, $state = [])
 * @method static Builder<static>|Continent inactive()
 * @method static Builder<static>|Continent newModelQuery()
 * @method static Builder<static>|Continent newQuery()
 * @method static Builder<static>|Continent onlyTrashed()
 * @method static Builder<static>|Continent query()
 * @method static Builder<static>|Continent whereCreatedAt($value)
 * @method static Builder<static>|Continent whereCreatedBy($value)
 * @method static Builder<static>|Continent whereDeletedAt($value)
 * @method static Builder<static>|Continent whereDeletedBy($value)
 * @method static Builder<static>|Continent whereId($value)
 * @method static Builder<static>|Continent whereIsActive($value)
 * @method static Builder<static>|Continent whereName($value)
 * @method static Builder<static>|Continent whereUpdatedAt($value)
 * @method static Builder<static>|Continent whereUpdatedBy($value)
 * @method static Builder<static>|Continent withTrashed(bool $withTrashed = true)
 * @method static Builder<static>|Continent withoutTrashed()
 * @mixin \Eloquent
 */
	class Continent extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int|null $hotel_id
 * @property int|null $type
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string|null $package
 * @property Carbon $arrival_date
 * @property int $pax
 * @property string|null $notes
 * @property HotelInquiryStatus $status
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
 * @property-read \App\Models\Partnership|null $hotel
 * @property-read \App\Models\Partnership|null $partnership
 * @property-read \App\Models\User|null $updatedBy
 * @method static Builder<static>|HotelInquiry active()
 * @method static Builder<static>|HotelInquiry done()
 * @method static Builder<static>|HotelInquiry followedUp()
 * @method static Builder<static>|HotelInquiry inactive()
 * @method static Builder<static>|HotelInquiry new()
 * @method static Builder<static>|HotelInquiry newModelQuery()
 * @method static Builder<static>|HotelInquiry newQuery()
 * @method static Builder<static>|HotelInquiry noReply()
 * @method static Builder<static>|HotelInquiry onlyTrashed()
 * @method static Builder<static>|HotelInquiry query()
 * @method static Builder<static>|HotelInquiry spam()
 * @method static Builder<static>|HotelInquiry whereArrivalDate($value)
 * @method static Builder<static>|HotelInquiry whereCreatedAt($value)
 * @method static Builder<static>|HotelInquiry whereCreatedBy($value)
 * @method static Builder<static>|HotelInquiry whereDeletedAt($value)
 * @method static Builder<static>|HotelInquiry whereDeletedBy($value)
 * @method static Builder<static>|HotelInquiry whereEmail($value)
 * @method static Builder<static>|HotelInquiry whereHotelId($value)
 * @method static Builder<static>|HotelInquiry whereId($value)
 * @method static Builder<static>|HotelInquiry whereName($value)
 * @method static Builder<static>|HotelInquiry whereNotes($value)
 * @method static Builder<static>|HotelInquiry wherePackage($value)
 * @method static Builder<static>|HotelInquiry wherePax($value)
 * @method static Builder<static>|HotelInquiry wherePhone($value)
 * @method static Builder<static>|HotelInquiry whereStatus($value)
 * @method static Builder<static>|HotelInquiry whereType($value)
 * @method static Builder<static>|HotelInquiry whereUpdatedAt($value)
 * @method static Builder<static>|HotelInquiry whereUpdatedBy($value)
 * @method static Builder<static>|HotelInquiry withTrashed(bool $withTrashed = true)
 * @method static Builder<static>|HotelInquiry withoutTrashed()
 * @method static \Database\Factories\HotelInquiryFactory factory($count = null, $state = [])
 * @mixin \Eloquent
 */
	class HotelInquiry extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int|null $continent_id
 * @property string $name
 * @property bool $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\Continent|null $continent
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \App\Models\User|null $updatedBy
 * @method static Builder<static>|Nationality active()
 * @method static \Database\Factories\NationalityFactory factory($count = null, $state = [])
 * @method static Builder<static>|Nationality inactive()
 * @method static Builder<static>|Nationality newModelQuery()
 * @method static Builder<static>|Nationality newQuery()
 * @method static Builder<static>|Nationality onlyTrashed()
 * @method static Builder<static>|Nationality query()
 * @method static Builder<static>|Nationality whereContinentId($value)
 * @method static Builder<static>|Nationality whereCreatedAt($value)
 * @method static Builder<static>|Nationality whereCreatedBy($value)
 * @method static Builder<static>|Nationality whereDeletedAt($value)
 * @method static Builder<static>|Nationality whereDeletedBy($value)
 * @method static Builder<static>|Nationality whereId($value)
 * @method static Builder<static>|Nationality whereIsActive($value)
 * @method static Builder<static>|Nationality whereName($value)
 * @method static Builder<static>|Nationality whereUpdatedAt($value)
 * @method static Builder<static>|Nationality whereUpdatedBy($value)
 * @method static Builder<static>|Nationality withTrashed(bool $withTrashed = true)
 * @method static Builder<static>|Nationality withoutTrashed()
 * @mixin \Eloquent
 */
	class Nationality extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $outlet_id
 * @property string $email
 * @property NewsletterStatus $status
 * @property string|null $reason
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
 * @property-read \App\Models\Outlet $outlet
 * @property-read \App\Models\User|null $updatedBy
 * @method static Builder<static>|Newsletter active()
 * @method static Builder<static>|Newsletter done()
 * @method static \Database\Factories\NewsletterFactory factory($count = null, $state = [])
 * @method static Builder<static>|Newsletter followedUp()
 * @method static Builder<static>|Newsletter inactive()
 * @method static Builder<static>|Newsletter new()
 * @method static Builder<static>|Newsletter newModelQuery()
 * @method static Builder<static>|Newsletter newQuery()
 * @method static Builder<static>|Newsletter noReply()
 * @method static Builder<static>|Newsletter onlyTrashed()
 * @method static Builder<static>|Newsletter query()
 * @method static Builder<static>|Newsletter spam()
 * @method static Builder<static>|Newsletter whereCreatedAt($value)
 * @method static Builder<static>|Newsletter whereCreatedBy($value)
 * @method static Builder<static>|Newsletter whereDeletedAt($value)
 * @method static Builder<static>|Newsletter whereDeletedBy($value)
 * @method static Builder<static>|Newsletter whereEmail($value)
 * @method static Builder<static>|Newsletter whereId($value)
 * @method static Builder<static>|Newsletter whereIsActive($value)
 * @method static Builder<static>|Newsletter whereOutletId($value)
 * @method static Builder<static>|Newsletter whereReason($value)
 * @method static Builder<static>|Newsletter whereStatus($value)
 * @method static Builder<static>|Newsletter whereUpdatedAt($value)
 * @method static Builder<static>|Newsletter whereUpdatedBy($value)
 * @method static Builder<static>|Newsletter withTrashed(bool $withTrashed = true)
 * @method static Builder<static>|Newsletter withoutTrashed()
 * @mixin \Eloquent
 */
	class Newsletter extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int|null $outlet_id
 * @property string $name
 * @property string|null $description
 * @property string|null $phone
 * @property string|null $email
 * @property int $type
 * @property float|null $lat
 * @property float|null $lng
 * @property string|null $terms_and_conditions
 * @property string|null $announcement
 * @property string $slug
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 * @property int $hr_visibility
 * @property int $pos_visibility
 * @property int $customer_visibility
 * @property string|null $address
 * @property string|null $google_maps
 * @property string|null $google_maps_iframe
 * @property string|null $contact
 * @property string|null $facebook
 * @property string|null $twitter
 * @property string|null $instagram
 * @property string|null $youtube
 * @property string|null $linkedin
 * @property string|null $tiktok
 * @property Carbon|null $open_hour
 * @property Carbon|null $close_hour
 * @property string|null $image_url
 * @property string|null $image_reservation_url
 * @property string|null $marquee
 * @property string|null $menu_image_url
 * @property string $text_color
 * @property string|null $bg_color
 * @property string|null $logo_url
 * @property string|null $logo_white_url
 * @property string|null $favicon_url
 * @property bool $is_reservation
 * @property bool $is_dark
 * @property bool $is_active
 * @property string|null $map_url
 * @property int $open_status
 * @property string|null $pin_code
 * @property string|null $host_pin_code
 * @property string|null $token
 * @property int $is_reservable
 * @property string|null $google_review_url
 * @property int|null $open_for_reservation
 * @property int $is_using_guest_layout
 * @property string|null $cut_off_date
 * @property string|null $maximum_eta
 * @property int $reservation_payment_type
 * @property float|null $tax
 * @property float|null $service
 * @property string|null $xendit_user_id
 * @property string|null $xendit_api_key
 * @property int $use_tax
 * @property int $use_service
 * @property string|null $general_admission_url
 * @property int $holiday_type
 * @property int|null $location_id
 * @property int|null $national_holiday_group_id
 * @property int $use_xendit_fee
 * @property int $can_refund
 * @property string|null $house_rules
 * @property int $bod_visibility
 * @property int $max_standing_capacity
 * @property string|null $extra_information
 * @property int|null $occupancy_rate_group_weekday_id
 * @property int|null $occupancy_rate_group_weekend_id
 * @property string $timezone
 * @property int $is_using_ticket
 * @property string|null $ticket_table_map_image
 * @property int $payment_gateway
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \App\Models\User|null $updatedBy
 * @method static Builder<static>|Outlet active()
 * @method static Builder<static>|Outlet dark()
 * @method static \Database\Factories\OutletFactory factory($count = null, $state = [])
 * @method static Builder<static>|Outlet inactive()
 * @method static Builder<static>|Outlet light()
 * @method static Builder<static>|Outlet newModelQuery()
 * @method static Builder<static>|Outlet newQuery()
 * @method static Builder<static>|Outlet notReservation()
 * @method static Builder<static>|Outlet onlyTrashed()
 * @method static Builder<static>|Outlet query()
 * @method static Builder<static>|Outlet reservation()
 * @method static Builder<static>|Outlet whereAddress($value)
 * @method static Builder<static>|Outlet whereAnnouncement($value)
 * @method static Builder<static>|Outlet whereBgColor($value)
 * @method static Builder<static>|Outlet whereBodVisibility($value)
 * @method static Builder<static>|Outlet whereCanRefund($value)
 * @method static Builder<static>|Outlet whereCloseHour($value)
 * @method static Builder<static>|Outlet whereContact($value)
 * @method static Builder<static>|Outlet whereCreatedAt($value)
 * @method static Builder<static>|Outlet whereCreatedBy($value)
 * @method static Builder<static>|Outlet whereCustomerVisibility($value)
 * @method static Builder<static>|Outlet whereCutOffDate($value)
 * @method static Builder<static>|Outlet whereDeletedAt($value)
 * @method static Builder<static>|Outlet whereDeletedBy($value)
 * @method static Builder<static>|Outlet whereDescription($value)
 * @method static Builder<static>|Outlet whereEmail($value)
 * @method static Builder<static>|Outlet whereExtraInformation($value)
 * @method static Builder<static>|Outlet whereFacebook($value)
 * @method static Builder<static>|Outlet whereFaviconUrl($value)
 * @method static Builder<static>|Outlet whereGeneralAdmissionUrl($value)
 * @method static Builder<static>|Outlet whereGoogleMaps($value)
 * @method static Builder<static>|Outlet whereGoogleMapsIframe($value)
 * @method static Builder<static>|Outlet whereGoogleReviewUrl($value)
 * @method static Builder<static>|Outlet whereHolidayType($value)
 * @method static Builder<static>|Outlet whereHostPinCode($value)
 * @method static Builder<static>|Outlet whereHouseRules($value)
 * @method static Builder<static>|Outlet whereHrVisibility($value)
 * @method static Builder<static>|Outlet whereId($value)
 * @method static Builder<static>|Outlet whereImageReservationUrl($value)
 * @method static Builder<static>|Outlet whereImageUrl($value)
 * @method static Builder<static>|Outlet whereInstagram($value)
 * @method static Builder<static>|Outlet whereIsActive($value)
 * @method static Builder<static>|Outlet whereIsDark($value)
 * @method static Builder<static>|Outlet whereIsReservable($value)
 * @method static Builder<static>|Outlet whereIsReservation($value)
 * @method static Builder<static>|Outlet whereIsUsingGuestLayout($value)
 * @method static Builder<static>|Outlet whereIsUsingTicket($value)
 * @method static Builder<static>|Outlet whereLat($value)
 * @method static Builder<static>|Outlet whereLinkedin($value)
 * @method static Builder<static>|Outlet whereLng($value)
 * @method static Builder<static>|Outlet whereLocationId($value)
 * @method static Builder<static>|Outlet whereLogoUrl($value)
 * @method static Builder<static>|Outlet whereLogoWhiteUrl($value)
 * @method static Builder<static>|Outlet whereMapUrl($value)
 * @method static Builder<static>|Outlet whereMarquee($value)
 * @method static Builder<static>|Outlet whereMaxStandingCapacity($value)
 * @method static Builder<static>|Outlet whereMaximumEta($value)
 * @method static Builder<static>|Outlet whereMenuImageUrl($value)
 * @method static Builder<static>|Outlet whereName($value)
 * @method static Builder<static>|Outlet whereNationalHolidayGroupId($value)
 * @method static Builder<static>|Outlet whereOccupancyRateGroupWeekdayId($value)
 * @method static Builder<static>|Outlet whereOccupancyRateGroupWeekendId($value)
 * @method static Builder<static>|Outlet whereOpenForReservation($value)
 * @method static Builder<static>|Outlet whereOpenHour($value)
 * @method static Builder<static>|Outlet whereOpenStatus($value)
 * @method static Builder<static>|Outlet whereOutletId($value)
 * @method static Builder<static>|Outlet wherePaymentGateway($value)
 * @method static Builder<static>|Outlet wherePhone($value)
 * @method static Builder<static>|Outlet wherePinCode($value)
 * @method static Builder<static>|Outlet wherePosVisibility($value)
 * @method static Builder<static>|Outlet whereReservationPaymentType($value)
 * @method static Builder<static>|Outlet whereService($value)
 * @method static Builder<static>|Outlet whereSlug($value)
 * @method static Builder<static>|Outlet whereTax($value)
 * @method static Builder<static>|Outlet whereTermsAndConditions($value)
 * @method static Builder<static>|Outlet whereTextColor($value)
 * @method static Builder<static>|Outlet whereTicketTableMapImage($value)
 * @method static Builder<static>|Outlet whereTiktok($value)
 * @method static Builder<static>|Outlet whereTimezone($value)
 * @method static Builder<static>|Outlet whereToken($value)
 * @method static Builder<static>|Outlet whereTwitter($value)
 * @method static Builder<static>|Outlet whereType($value)
 * @method static Builder<static>|Outlet whereUpdatedAt($value)
 * @method static Builder<static>|Outlet whereUpdatedBy($value)
 * @method static Builder<static>|Outlet whereUseService($value)
 * @method static Builder<static>|Outlet whereUseTax($value)
 * @method static Builder<static>|Outlet whereUseXenditFee($value)
 * @method static Builder<static>|Outlet whereXenditApiKey($value)
 * @method static Builder<static>|Outlet whereXenditUserId($value)
 * @method static Builder<static>|Outlet whereYoutube($value)
 * @method static Builder<static>|Outlet withTrashed(bool $withTrashed = true)
 * @method static Builder<static>|Outlet withoutTrashed()
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Newsletter> $newsletters
 * @property-read int|null $newsletters_count
 * @mixin \Eloquent
 */
	class Outlet extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string|null $code
 * @property string $name
 * @property PartnershipCategory $category
 * @property int|null $type
 * @property string|null $address
 * @property string|null $description
 * @property array<array-key, mixed>|null $inclusions
 * @property array<array-key, mixed>|null $benefits
 * @property array<array-key, mixed>|null $terms_and_conditions
 * @property int $capacity
 * @property int $max_capacity
 * @property int $price
 * @property int|null $discount_fnb
 * @property int|null $discount_mc
 * @property int|null $cashback
 * @property string|null $bank
 * @property string|null $account_number
 * @property string|null $account_name
 * @property string $image_url
 * @property int|null $position
 * @property string|null $slug
 * @property bool $is_show
 * @property bool $is_active
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \App\Models\User|null $updatedBy
 * @method static Builder<static>|Partnership active()
 * @method static Builder<static>|Partnership inactive()
 * @method static Builder<static>|Partnership newModelQuery()
 * @method static Builder<static>|Partnership newQuery()
 * @method static Builder<static>|Partnership notShown()
 * @method static Builder<static>|Partnership onlyTrashed()
 * @method static Builder<static>|Partnership permission($permissions, $without = false)
 * @method static Builder<static>|Partnership query()
 * @method static Builder<static>|Partnership role($roles, $guard = null, $without = false)
 * @method static Builder<static>|Partnership show()
 * @method static Builder<static>|Partnership whereAccountName($value)
 * @method static Builder<static>|Partnership whereAccountNumber($value)
 * @method static Builder<static>|Partnership whereAddress($value)
 * @method static Builder<static>|Partnership whereBank($value)
 * @method static Builder<static>|Partnership whereBenefits($value)
 * @method static Builder<static>|Partnership whereCapacity($value)
 * @method static Builder<static>|Partnership whereCashback($value)
 * @method static Builder<static>|Partnership whereCategory($value)
 * @method static Builder<static>|Partnership whereCode($value)
 * @method static Builder<static>|Partnership whereCreatedAt($value)
 * @method static Builder<static>|Partnership whereDeletedAt($value)
 * @method static Builder<static>|Partnership whereDescription($value)
 * @method static Builder<static>|Partnership whereDiscountFnb($value)
 * @method static Builder<static>|Partnership whereDiscountMc($value)
 * @method static Builder<static>|Partnership whereId($value)
 * @method static Builder<static>|Partnership whereImageUrl($value)
 * @method static Builder<static>|Partnership whereInclusions($value)
 * @method static Builder<static>|Partnership whereIsActive($value)
 * @method static Builder<static>|Partnership whereIsShow($value)
 * @method static Builder<static>|Partnership whereMaxCapacity($value)
 * @method static Builder<static>|Partnership whereName($value)
 * @method static Builder<static>|Partnership wherePosition($value)
 * @method static Builder<static>|Partnership wherePrice($value)
 * @method static Builder<static>|Partnership whereSlug($value)
 * @method static Builder<static>|Partnership whereTermsAndConditions($value)
 * @method static Builder<static>|Partnership whereType($value)
 * @method static Builder<static>|Partnership whereUpdatedAt($value)
 * @method static Builder<static>|Partnership withTrashed(bool $withTrashed = true)
 * @method static Builder<static>|Partnership withoutPermission($permissions)
 * @method static Builder<static>|Partnership withoutRole($roles, $guard = null)
 * @method static Builder<static>|Partnership withoutTrashed()
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @method static Builder<static>|Partnership whereCreatedBy($value)
 * @method static Builder<static>|Partnership whereDeletedBy($value)
 * @method static Builder<static>|Partnership whereUpdatedBy($value)
 * @method static \Database\Factories\PartnershipFactory factory($count = null, $state = [])
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PartnershipImage> $images
 * @property-read int|null $images_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\HotelInquiry> $inquiries
 * @property-read int|null $inquiries_count
 * @mixin \Eloquent
 */
	class Partnership extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $hotel_id
 * @property string $image_url
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
 * @property-read \App\Models\Partnership $partnership
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \App\Models\User|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PartnershipImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PartnershipImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PartnershipImage onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PartnershipImage permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PartnershipImage query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PartnershipImage role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PartnershipImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PartnershipImage whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PartnershipImage whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PartnershipImage whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PartnershipImage whereHotelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PartnershipImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PartnershipImage whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PartnershipImage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PartnershipImage whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PartnershipImage withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PartnershipImage withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PartnershipImage withoutRole($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PartnershipImage withoutTrashed()
 * @mixin \Eloquent
 */
	class PartnershipImage extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int|null $outlet_id
 * @property int $product_category_id
 * @property int|null $table_category_id
 * @property ProductType $type
 * @property string|null $code
 * @property string $name
 * @property string $name_id
 * @property string $name_zh
 * @property string|null $description
 * @property string|null $description_id
 * @property string|null $description_zh
 * @property string|null $duration
 * @property string|null $duration_id
 * @property string|null $duration_zh
 * @property array<array-key, mixed>|null $inclusions
 * @property array<array-key, mixed>|null $inclusions_id
 * @property array<array-key, mixed>|null $inclusions_zh
 * @property int $price
 * @property int|null $tax
 * @property int|null $service
 * @property int|null $quota
 * @property string|null $image_url
 * @property bool $is_promoted
 * @property bool $is_show
 * @property bool $is_active
 * @property string $slug
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\ProductCategory $category
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read int $total_price
 * @property-read \App\Models\Outlet|null $outlet
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductPrice> $prices
 * @property-read int|null $prices_count
 * @property-read \App\Models\TableCategory|null $tableCategory
 * @property-read \App\Models\User|null $updatedBy
 * @method static Builder<static>|Product active()
 * @method static \Database\Factories\ProductFactory factory($count = null, $state = [])
 * @method static Builder<static>|Product inactive()
 * @method static Builder<static>|Product newModelQuery()
 * @method static Builder<static>|Product newQuery()
 * @method static Builder<static>|Product notPromoted()
 * @method static Builder<static>|Product notShown()
 * @method static Builder<static>|Product onlyTrashed()
 * @method static Builder<static>|Product promoted()
 * @method static Builder<static>|Product query()
 * @method static Builder<static>|Product show()
 * @method static Builder<static>|Product whereCode($value)
 * @method static Builder<static>|Product whereCreatedAt($value)
 * @method static Builder<static>|Product whereCreatedBy($value)
 * @method static Builder<static>|Product whereDeletedAt($value)
 * @method static Builder<static>|Product whereDeletedBy($value)
 * @method static Builder<static>|Product whereDescription($value)
 * @method static Builder<static>|Product whereDescriptionId($value)
 * @method static Builder<static>|Product whereDescriptionZh($value)
 * @method static Builder<static>|Product whereDuration($value)
 * @method static Builder<static>|Product whereDurationId($value)
 * @method static Builder<static>|Product whereDurationZh($value)
 * @method static Builder<static>|Product whereId($value)
 * @method static Builder<static>|Product whereImageUrl($value)
 * @method static Builder<static>|Product whereInclusions($value)
 * @method static Builder<static>|Product whereInclusionsId($value)
 * @method static Builder<static>|Product whereInclusionsZh($value)
 * @method static Builder<static>|Product whereIsActive($value)
 * @method static Builder<static>|Product whereIsPromoted($value)
 * @method static Builder<static>|Product whereIsShow($value)
 * @method static Builder<static>|Product whereName($value)
 * @method static Builder<static>|Product whereNameId($value)
 * @method static Builder<static>|Product whereNameZh($value)
 * @method static Builder<static>|Product whereOutletId($value)
 * @method static Builder<static>|Product wherePrice($value)
 * @method static Builder<static>|Product whereProductCategoryId($value)
 * @method static Builder<static>|Product whereQuota($value)
 * @method static Builder<static>|Product whereService($value)
 * @method static Builder<static>|Product whereSlug($value)
 * @method static Builder<static>|Product whereTableCategoryId($value)
 * @method static Builder<static>|Product whereTax($value)
 * @method static Builder<static>|Product whereType($value)
 * @method static Builder<static>|Product whereUpdatedAt($value)
 * @method static Builder<static>|Product whereUpdatedBy($value)
 * @method static Builder<static>|Product withTrashed(bool $withTrashed = true)
 * @method static Builder<static>|Product withoutTrashed()
 * @mixin \Eloquent
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $name_id
 * @property string $name_zh
 * @property string|null $icon
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductCategory whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductCategory whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductCategory whereNameId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductCategory whereNameZh($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ProductCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $product_id
 * @property int $price
 * @property string $date
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductPrice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductPrice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductPrice query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductPrice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductPrice whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductPrice whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductPrice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductPrice whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductPrice wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductPrice whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductPrice whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ProductPrice extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int|null $outlet_id
 * @property int|null $event_id
 * @property int|null $user_id
 * @property int|null $holywings_membership_id
 * @property int|null $membership_id
 * @property int|null $nationality_id
 * @property string|null $membership_old
 * @property string $name
 * @property string $phone
 * @property string|null $email
 * @property int|null $gender
 * @property string|null $date_of_birth
 * @property int $status
 * @property int $type
 * @property int $purpose
 * @property string $datetime
 * @property string|null $eta
 * @property int $payment_category
 * @property int $payment_percentage
 * @property int $minimum_cost
 * @property int|null $price
 * @property int|null $discount
 * @property int $commission
 * @property int $pax
 * @property float|null $credit
 * @property string|null $notes
 * @property int $no_answer_count
 * @property string|null $reason
 * @property string|null $unique_identifier
 * @property string|null $event_name
 * @property int|null $table_package_id
 * @property int|null $table_price_group_id
 * @property int|null $reservation_discount_id
 * @property int|null $affiliator_code_id
 * @property int|null $hotel_id
 * @property int|null $driver_mockup_id
 * @property int|null $driver_voucher_id
 * @property int|null $sales_outbound_id
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string|null $cancellation_notes
 * @property int $notification_counter
 * @property int $payment_type
 * @property string|null $bill_id
 * @property int|null $custom_payment_outlet_id
 * @property int|null $whats_on_id
 * @property int $closed_bill_amount
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereAffiliatorCodeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereBillId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereCancellationNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereClosedBillAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereCommission($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereCredit($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereCustomPaymentOutletId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereDateOfBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereDriverMockupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereDriverVoucherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereEta($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereEventName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereHolywingsMembershipId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereHotelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereMembershipId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereMembershipOld($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereMinimumCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereNationalityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereNoAnswerCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereNotificationCounter($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereOutletId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation wherePax($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation wherePaymentCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation wherePaymentPercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation wherePaymentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation wherePurpose($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereReservationDiscountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereSalesOutboundId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereTablePackageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereTablePriceGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereUniqueIdentifier($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereWhatsOnId($value)
 * @mixin \Eloquent
 */
	class Reservation extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $code
 * @property string $name
 * @property SalesOutboundType $type
 * @property string|null $pic
 * @property bool $is_active
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \App\Models\User|null $updatedBy
 * @method static Builder<static>|SalesOutbound active()
 * @method static Builder<static>|SalesOutbound corporate()
 * @method static Builder<static>|SalesOutbound eventOrganizer()
 * @method static Builder<static>|SalesOutbound freelancer()
 * @method static Builder<static>|SalesOutbound inactive()
 * @method static Builder<static>|SalesOutbound newModelQuery()
 * @method static Builder<static>|SalesOutbound newQuery()
 * @method static Builder<static>|SalesOutbound onlyTrashed()
 * @method static Builder<static>|SalesOutbound query()
 * @method static Builder<static>|SalesOutbound travelAgent()
 * @method static Builder<static>|SalesOutbound whereCode($value)
 * @method static Builder<static>|SalesOutbound whereCreatedAt($value)
 * @method static Builder<static>|SalesOutbound whereCreatedBy($value)
 * @method static Builder<static>|SalesOutbound whereDeletedAt($value)
 * @method static Builder<static>|SalesOutbound whereDeletedBy($value)
 * @method static Builder<static>|SalesOutbound whereId($value)
 * @method static Builder<static>|SalesOutbound whereIsActive($value)
 * @method static Builder<static>|SalesOutbound whereName($value)
 * @method static Builder<static>|SalesOutbound wherePic($value)
 * @method static Builder<static>|SalesOutbound whereType($value)
 * @method static Builder<static>|SalesOutbound whereUpdatedAt($value)
 * @method static Builder<static>|SalesOutbound whereUpdatedBy($value)
 * @method static Builder<static>|SalesOutbound withTrashed(bool $withTrashed = true)
 * @method static Builder<static>|SalesOutbound withoutTrashed()
 * @method static \Database\Factories\SalesOutboundFactory factory($count = null, $state = [])
 * @mixin \Eloquent
 */
	class SalesOutbound extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $url
 * @property string $request
 * @property string $response
 * @property string $status
 * @property string $channel
 * @property string $message_type
 * @property string $template_name
 * @property string $language
 * @property string $from
 * @property string $name
 * @property string $phone
 * @property int|null $reservation_id
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
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \App\Models\Reservation|null $reservation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \App\Models\User|null $updatedBy
 * @method static \Database\Factories\SleekflowLogFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SleekflowLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SleekflowLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SleekflowLog onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SleekflowLog permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SleekflowLog query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SleekflowLog role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SleekflowLog whereChannel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SleekflowLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SleekflowLog whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SleekflowLog whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SleekflowLog whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SleekflowLog whereFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SleekflowLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SleekflowLog whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SleekflowLog whereMessageType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SleekflowLog whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SleekflowLog wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SleekflowLog whereRequest($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SleekflowLog whereReservationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SleekflowLog whereResponse($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SleekflowLog whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SleekflowLog whereTemplateName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SleekflowLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SleekflowLog whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SleekflowLog whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SleekflowLog withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SleekflowLog withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SleekflowLog withoutRole($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SleekflowLog withoutTrashed()
 * @mixin \Eloquent
 */
	class SleekflowLog extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $benefits
 * @property string|null $vip_benefits
 * @property string|null $announcement
 * @property string|null $title
 * @property string|null $sub_title
 * @property string|null $name_weekday
 * @property string|null $name_weekend
 * @property float $minimum_cost_weekday
 * @property float $minimum_cost_weekend
 * @property int $type
 * @property int $maximum_capacity
 * @property int $extra_seat
 * @property float $extra_pax_cost
 * @property string|null $prefix
 * @property string|null $size
 * @property int|null $outlet_id
 * @property string|null $image_url
 * @property string|null $banner_url
 * @property int|null $position
 * @property int $is_promoted
 * @property int|null $atlas_table_id
 * @property int|null $table_section_id
 * @property string|null $meta_title
 * @property string|null $meta_description
 * @property int $with_kids
 * @property int $is_free_valet
 * @property int $is_show
 * @property int $is_active
 * @property string|null $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int $price_weekday
 * @property int $price_weekend
 * @property int $use_discount
 * @property string|null $min_eta
 * @property string|null $max_eta
 * @property int $standing_capacity
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TableCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TableCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TableCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TableCategory whereAnnouncement($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TableCategory whereAtlasTableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TableCategory whereBannerUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TableCategory whereBenefits($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TableCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TableCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TableCategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TableCategory whereExtraPaxCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TableCategory whereExtraSeat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TableCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TableCategory whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TableCategory whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TableCategory whereIsFreeValet($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TableCategory whereIsPromoted($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TableCategory whereIsShow($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TableCategory whereMaxEta($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TableCategory whereMaximumCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TableCategory whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TableCategory whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TableCategory whereMinEta($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TableCategory whereMinimumCostWeekday($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TableCategory whereMinimumCostWeekend($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TableCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TableCategory whereNameWeekday($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TableCategory whereNameWeekend($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TableCategory whereOutletId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TableCategory wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TableCategory wherePrefix($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TableCategory wherePriceWeekday($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TableCategory wherePriceWeekend($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TableCategory whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TableCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TableCategory whereStandingCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TableCategory whereSubTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TableCategory whereTableSectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TableCategory whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TableCategory whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TableCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TableCategory whereUseDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TableCategory whereVipBenefits($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TableCategory whereWithKids($value)
 * @mixin \Eloquent
 */
	class TableCategory extends \Eloquent {}
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

