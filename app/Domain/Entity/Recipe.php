<?php

namespace App\Domain\Entity;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Domain\Entity\Recipe
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
 */
class Recipe extends Model
{
    use HasFactory;

    protected $fillable= [
        'label',
        'active',
        'start_date_recipe',
        'end_date_recipe',
        'slug',
        'picture_path'
    ];

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class, 'page_id');
    }

}
