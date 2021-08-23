<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Client
 *
 * @property int $id
 * @property string $name
 * @property string|null $phone
 * @property string|null $address
 * @property int|null $zip
 * @property string|null $city
 * @property string|null $siren
 * @property string $slug
 * @property string|null $logo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Contact[] $contacts
 * @property-read int|null $contacts_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Estimation[] $estimations
 * @property-read int|null $estimations_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Estimation[] $estimationsByOrder
 * @property-read int|null $estimations_by_order_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Estimation[] $estimationsIsActive
 * @property-read int|null $estimations_is_active_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Invoice[] $invoices
 * @property-read int|null $invoices_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Invoice[] $invoicesNotPaid
 * @property-read int|null $invoices_not_paid_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Project[] $projects
 * @property-read int|null $projects_count
 * @method static \Illuminate\Database\Eloquent\Builder|Client newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client query()
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereSiren($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereZip($value)
 * @mixin \Eloquent
 */
	class Client extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Contact
 *
 * @property int $id
 * @property string $name
 * @property string $lastname
 * @property string $email
 * @property string $phone
 * @property string $slug
 * @property int $client_id
 * @property string|null $fonction
 * @property string|null $picture_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $contact_function
 * @property-read \App\Models\Client $client
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Estimation[] $estimations
 * @property-read int|null $estimations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact query()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereContactFunction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereFonction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact wherePicturePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Page[] $pages
 * @property-read int|null $pages_count
 */
	class Contact extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Device
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $libelle
 * @property string $slug
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Page[] $pages
 * @property-read int|null $pages_count
 * @method static \Illuminate\Database\Eloquent\Builder|Device newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Device newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Device query()
 * @method static \Illuminate\Database\Eloquent\Builder|Device whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Device whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Device whereLibelle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Device whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Device whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Device extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Estimation
 *
 * @property int $id
 * @property string|null $reference
 * @property string $title
 * @property int $total
 * @property int $validation
 * @property string|null $validation_date
 * @property int $contact_validator_id
 * @property int $validation_duration
 * @property int $month
 * @property int $client_id
 * @property int $contact_id
 * @property int|null $invoice_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $year
 * @property int|null $totalnotax
 * @property int|null $totaltax
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Service[] $EstimationsServices
 * @property-read int|null $estimations_services_count
 * @property-read \App\Models\Service $Service
 * @property-read \App\Models\Client $client
 * @property-read \App\Models\Contact $contact
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\EstimationDetail[] $estimationDetails
 * @property-read int|null $estimation_details_count
 * @property-read \App\Models\Invoice|null $invoice
 * @method static Builder|Estimation isActive()
 * @method static Builder|Estimation newModelQuery()
 * @method static Builder|Estimation newQuery()
 * @method static Builder|Estimation query()
 * @method static Builder|Estimation whereClientId($value)
 * @method static Builder|Estimation whereContactId($value)
 * @method static Builder|Estimation whereContactValidatorId($value)
 * @method static Builder|Estimation whereCreatedAt($value)
 * @method static Builder|Estimation whereId($value)
 * @method static Builder|Estimation whereInvoiceId($value)
 * @method static Builder|Estimation whereMonth($value)
 * @method static Builder|Estimation whereReference($value)
 * @method static Builder|Estimation whereTitle($value)
 * @method static Builder|Estimation whereTotal($value)
 * @method static Builder|Estimation whereTotalnotax($value)
 * @method static Builder|Estimation whereTotaltax($value)
 * @method static Builder|Estimation whereUpdatedAt($value)
 * @method static Builder|Estimation whereValidation($value)
 * @method static Builder|Estimation whereValidationDate($value)
 * @method static Builder|Estimation whereValidationDuration($value)
 * @method static Builder|Estimation whereYear($value)
 * @mixin \Eloquent
 * @property string|null $observation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Skill[] $estimationsSkills
 * @property-read int|null $estimations_skills_count
 * @property-read int|null $invoice_count
 * @method static Builder|Estimation whereObservation($value)
 */
	class Estimation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\EstimationDetail
 *
 * @property int $id
 * @property string $product
 * @property string $description
 * @property int $quantity
 * @property string $unit_price
 * @property string $total_row
 * @property int $display_order
 * @property int $estimation_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $taxe_id
 * @property int|null $total_row_notax
 * @property int|null $total_row_tax
 * @property-read \App\Models\Estimation $estimation
 * @method static \Illuminate\Database\Eloquent\Builder|EstimationDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EstimationDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EstimationDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|EstimationDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EstimationDetail whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EstimationDetail whereDisplayOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EstimationDetail whereEstimationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EstimationDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EstimationDetail whereProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EstimationDetail whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EstimationDetail whereTaxeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EstimationDetail whereTotalRow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EstimationDetail whereTotalRowNotax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EstimationDetail whereTotalRowTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EstimationDetail whereUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EstimationDetail whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Taxe $taxe
 */
	class EstimationDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Invoice
 *
 * @property int $id
 * @property string $title
 * @property string $number
 * @property string $amount
 * @property int $paid
 * @property int $client_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $year
 * @property-read \App\Models\Client $client
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Estimation[] $estimations
 * @property-read int|null $estimations_count
 * @method static Builder|Invoice newModelQuery()
 * @method static Builder|Invoice newQuery()
 * @method static Builder|Invoice notPaid()
 * @method static Builder|Invoice query()
 * @method static Builder|Invoice whereAmount($value)
 * @method static Builder|Invoice whereClientId($value)
 * @method static Builder|Invoice whereCreatedAt($value)
 * @method static Builder|Invoice whereId($value)
 * @method static Builder|Invoice whereNumber($value)
 * @method static Builder|Invoice wherePaid($value)
 * @method static Builder|Invoice whereTitle($value)
 * @method static Builder|Invoice whereUpdatedAt($value)
 * @method static Builder|Invoice whereYear($value)
 * @mixin \Eloquent
 * @property string $reference
 * @property int $advance
 * @property string|null $amount_no_tax
 * @property string|null $amount_tax
 * @property string $month
 * @property string|null $observation
 * @property string|null $paiment_date
 * @property int $estimation_id
 * @property-read \App\Models\Estimation $estimation
 * @method static Builder|Invoice isAdvance()
 * @method static Builder|Invoice whereAdvance($value)
 * @method static Builder|Invoice whereAmountNoTax($value)
 * @method static Builder|Invoice whereAmountTax($value)
 * @method static Builder|Invoice whereEstimationId($value)
 * @method static Builder|Invoice whereMonth($value)
 * @method static Builder|Invoice whereObservation($value)
 * @method static Builder|Invoice wherePaimentDate($value)
 * @method static Builder|Invoice whereReference($value)
 */
	class Invoice extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MediaProject
 *
 * @property int $id
 * @property string $mediaProjectPath
 * @property int $displayOrder
 * @property int $project_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Project $project
 * @method static \Illuminate\Database\Eloquent\Builder|MediaProject newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MediaProject newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MediaProject query()
 * @method static \Illuminate\Database\Eloquent\Builder|MediaProject whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaProject whereDisplayOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaProject whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaProject whereMediaProjectPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaProject whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaProject whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class MediaProject extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Page
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $label
 * @property string $url_path
 * @property string $slug
 * @property int $project_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Contact[] $contacts
 * @property-read int|null $contacts_count
 * @property-read \App\Models\Project $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Recipe[] $recipes
 * @property-read int|null $recipes_count
 * @method static \Illuminate\Database\Eloquent\Builder|Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page query()
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereUrlPath($value)
 * @mixin \Eloquent
 */
	class Page extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Permission
 *
 * @property int $id
 * @property string $key
 * @property string $name
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Permission extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Project
 *
 * @property int $id
 * @property string $title
 * @property string $mission
 * @property string $result
 * @property string $mediaPortfolioProjectPath
 * @property string $background_img_path
 * @property string $colorProject
 * @property string $slug
 * @property string $endProject
 * @property int $client_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Client $client
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MediaProject[] $mediaProjects
 * @property-read int|null $media_projects_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Service[] $services
 * @property-read int|null $services_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Skill[] $skills
 * @property-read int|null $skills_count
 * @method static \Illuminate\Database\Eloquent\Builder|Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project query()
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereBackgroundImgPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereColorProject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereEndProject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereMediaPortfolioProjectPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereMission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereResult($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $in_progress
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereInProgress($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Recipe[] $recipes
 * @property-read int|null $recipes_count
 */
	class Project extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Recipe
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $label
 * @property int $active
 * @property string $start_date_recipe
 * @property string|null $end_date_recipe
 * @property string $slug
 * @property string|null $picture_path
 * @property int $project_id
 * @property int $client_id
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe query()
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereEndDateRecipe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe wherePicturePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereStartDateRecipe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $page_id
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe wherePageId($value)
 * @property string|null $update_dev
 * @property string|null $update_customer
 * @property int $validation_dev
 * @property int $validation_customer
 * @property int $closed
 * @property string|null $closed_date
 * @property \App\Models\User $author
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Device[] $devices
 * @property-read int|null $devices_count
 * @property-read \App\Models\Page $page
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereClosed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereClosedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereUpdateCustomer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereUpdateDev($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereValidationCustomer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereValidationDev($value)
 * @property string $description
 * @property int $user_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\RecipeDetails[] $recipeDetails
 * @property-read int|null $recipe_details_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recipe whereUserId($value)
 */
	class Recipe extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\RecipeDetails
 *
 * @property int $id
 * @property string $description
 * @property string|null $picture_path
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $user_id
 * @property int $device_id
 * @property int $recipe_id
 * @property-read \App\Models\Device $device
 * @property-read \App\Models\Recipe $recipe
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|RecipeDetails newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RecipeDetails newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RecipeDetails query()
 * @method static \Illuminate\Database\Eloquent\Builder|RecipeDetails whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RecipeDetails whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RecipeDetails whereDeviceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RecipeDetails whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RecipeDetails wherePicturePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RecipeDetails whereRecipeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RecipeDetails whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RecipeDetails whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RecipeDetails whereUserId($value)
 */
	class RecipeDetails extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $users
 * @property-read int|null $users_count
 * @method static Builder|Role hasPermission(string $permission)
 * @method static Builder|Role newModelQuery()
 * @method static Builder|Role newQuery()
 * @method static Builder|Role query()
 * @method static Builder|Role whereCreatedAt($value)
 * @method static Builder|Role whereDescription($value)
 * @method static Builder|Role whereId($value)
 * @method static Builder|Role whereName($value)
 * @method static Builder|Role whereSlug($value)
 * @method static Builder|Role whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Service
 *
 * @property int $id
 * @property string $libelle
 * @property string $description
 * @property string $expertise
 * @property string $icon
 * @property string|null $color_icon
 * @property int $status
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Estimation[] $Estimations
 * @property-read int|null $estimations_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Estimation[] $EstimationsServices
 * @property-read int|null $estimations_services_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Project[] $projects
 * @property-read int|null $projects_count
 * @method static \Illuminate\Database\Eloquent\Builder|Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service query()
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereColorIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereExpertise($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereLibelle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Service extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Skill
 *
 * @property int $id
 * @property string $skill
 * @property int|null $status
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Project[] $projects
 * @property-read int|null $projects_count
 * @method static \Illuminate\Database\Eloquent\Builder|Skill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill query()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereSkill($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereStatus($value)
 * @mixin \Eloquent
 * @property string $libelle
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Estimation[] $estimations
 * @property-read int|null $estimations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereLibelle($value)
 * @method static \Database\Factories\SkillFactory factory(...$parameters)
 */
	class Skill extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Taxe
 *
 * @property int $id
 * @property string $tax
 * @property int $main
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Taxe newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Taxe newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Taxe query()
 * @method static \Illuminate\Database\Eloquent\Builder|Taxe whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Taxe whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Taxe whereMain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Taxe whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Taxe whereTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Taxe whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Taxe extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $lastname
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string $slug
 * @property string|null $remember_token
 * @property int|null $current_team_id
 * @property string|null $profile_photo_path
 * @property int $authorized
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAuthorized($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrentTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $user_group
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserGroup($value)
 */
	class User extends \Eloquent {}
}

