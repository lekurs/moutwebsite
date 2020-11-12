<?php


namespace App\Domain\Entity;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    protected $fillables = [
        'title',
        'mission',
        'result',
        'imagePortfolioProjectPath',
        'colorProject',
        'completionDate',
        'slug'
    ];

//    public function client(): BelongsTo
//    {
//        return $this->belongsTo(Client::class);
//    }

    public function mediaProjects(): HasMany
    {
        return $this->hasMany(MediaProject::class);
    }

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'projects_services');
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(Skill::class, 'projects_skills');
    }
}
