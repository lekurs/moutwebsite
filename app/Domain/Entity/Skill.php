<?php


namespace App\Domain\Entity;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
}
