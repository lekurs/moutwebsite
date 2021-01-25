<?php


namespace App\Domain\Entity;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    protected $fillable = [
        'libelle',
        'description',
        'icon'
    ];

    public function Estimations(): HasMany
    {
        return $this->hasMany(Estimation::class, 'estimation_id');
    }

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'projects_services');
    }

    public function EstimationsServices(): BelongsToMany
    {
        return $this->belongsToMany(Estimation::class, 'estimations_services');
    }
}

