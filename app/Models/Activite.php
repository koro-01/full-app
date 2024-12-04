<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'seminaire_id',
    ];

    /**
     * Relationship: Activite belongs to a Seminaire
     */
    public function seminaire()
    {
        return $this->belongsTo(Seminaire::class);
    }
}
