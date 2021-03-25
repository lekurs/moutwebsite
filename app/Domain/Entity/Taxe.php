<?php

namespace App\Domain\Entity;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taxe extends Model
{
    protected $fillable = [
        'tax',
        'main'
    ];

}
