<?php


namespace App\Domain\Entity;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EstimationDetail extends Model
{
    protected $fillable = [
      'product',
      'description',
      'quantity',
      'unit_price',
      'total_row',
      'display_order'
    ];

    protected $table = 'estimations_details';

    public function estimation(): BelongsTo
    {
        return $this->belongsTo(Estimation::class, 'estimation_id');
    }
}
