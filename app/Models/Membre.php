<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membre extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'sexe',
        'telephone',
        'email',
        'seminaire_id', // Make sure this field is in your database table
    ];

    // Define the relationship
    public function seminaire()
    {
        return $this->belongsTo(Seminaire::class, 'seminaire_id');
    }
}
