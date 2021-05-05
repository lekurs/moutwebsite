<?php


namespace App\Domain\Entity;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Domain\Entity\Invoice
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
 * @property-read \App\Domain\Entity\Client $client
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domain\Entity\Estimation[] $estimations
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
 */
class Invoice extends Model
{
    protected $fillable = [
        'title',
        'number',
        'amount',
        'paid',
        'paiement-date'
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

//    public function downPaiementInvoices(): BelongsTo
//    {
//        return $this->belongsTo(DownPaiementInvoice::class, 'downpaiementinvoice_id');
//    }

    public function estimations(): HasMany
    {
        return $this->hasMany(Estimation::class);
    }

    public function scopeNotPaid(Builder $query): Builder
    {
        return $query->where('paid', '=', false);
    }
}
