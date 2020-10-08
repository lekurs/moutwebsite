<?php


namespace App\Domain\Entity;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'address',
        'zip',
        'city',
        'siren',
        'logo'
    ];

    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class, 'client_id');
    }

    public function estimations(): HasMany
    {
        return $this->hasMany(Estimation::class, 'client_id');
    }

    public function estimationsIsActive(): HasMany
    {
        return $this->hasMany(Estimation::class, 'client_id')->isActive();
    }

    public function estimationsByOrder(): HasMany
    {
        return $this->hasMany(Estimation::class, 'client_id')->orderBy('created_at', 'asc');
    }

    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class, 'client_id');
    }

    public function invoicesNotPaid(): HasMany
    {
        return $this->hasMany(Invoice::class, 'client_id')->notPaid();
    }

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class, 'client_id');
    }
}
