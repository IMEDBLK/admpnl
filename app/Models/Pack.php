<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pack extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'prix',
        'duree',
    ];

    public function autoEcoles()
    {
        return $this->hasMany(AutoEcole::class);
    }
}
