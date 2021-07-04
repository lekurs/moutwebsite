<?php


namespace App\Domain\Entity;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Domain\Entity\Estimation
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domain\Entity\Service[] $EstimationsServices
 * @property-read int|null $estimations_services_count
 * @property-read \App\Domain\Entity\Service $Service
 * @property-read \App\Domain\Entity\Client $client
 * @property-read \App\Domain\Entity\Contact $contact
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domain\Entity\EstimationDetail[] $estimationDetails
 * @property-read int|null $estimation_details_count
 * @property-read \App\Domain\Entity\Invoice|null $invoice
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
 */
class Estimation extends Model
{
    protected $fillable = [
        'reference',
        'title',
        'body',
        'total',
        'validation',
        'year'
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }

    public function Service(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function invoice(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }
//
//    public function invoices()
//    {
//        return $this->belongsToMany(Invoice::class);
//    }

    public function estimationsSkills(): BelongsToMany
    {
        return $this->belongsToMany(Skill::class, 'estimations_skills');
    }

    public function scopeIsActive(Builder $query): Builder
    {
        return $query->where('validation', '=', 1);
    }

    public function estimationDetails(): HasMany
    {
        return $this->hasMany(EstimationDetail::class, 'estimation_id');
    }
}
