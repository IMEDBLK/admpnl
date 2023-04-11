<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutoEcole extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'adresse',
        'matricule_fiscale',
        'email',
        'password',
        'pack_id',
        'date_activation_pack'
    ];

    public function pack()
    {
        return $this->belongsTo(Pack::class);
    }
}
