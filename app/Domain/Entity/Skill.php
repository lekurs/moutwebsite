<?php


namespace App\Domain\Entity;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Domain\Entity\Skill
 *
 * @property int $id
 * @property string $skill
 * @property int|null $status
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domain\Entity\Project[] $projects
 * @property-read int|null $projects_count
 * @method static \Illuminate\Database\Eloquent\Builder|Skill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill query()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereSkill($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereStatus($value)
 * @mixin \Eloquent
 * @property string $libelle
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domain\Entity\Estimation[] $estimations
 * @property-read int|null $estimations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereLibelle($value)
 */
class Skill extends Model
{
    protected $fillable = [
        'skill'
    ];

    public $timestamps = false;

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'projects_skills');
    }

    public function estimations(): BelongsToMany
    {
        return $this->belongsToMany(Estimation::class, 'estimations_skills');
    }
}
