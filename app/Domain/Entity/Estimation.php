<?php


namespace App\Domain\Entity;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Estimation extends Model
{
    protected $fillable = [
        'number',
        'title',
        'body',
        'price',
        'validation',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }

    public function Service(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function downPaiementInvoice(): BelongsTo
    {
        return $this->belongsTo(DownPaiementInvoice::class, 'down_paiement_invoice_id');
    }

    public function scopeIsActive(Builder $query): Builder
    {
        return $query->where('validation', '=', 1);
    }
}
