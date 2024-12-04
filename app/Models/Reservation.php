<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_reservation',
        'status',
        'membre_id',
        'seminaire_id',
    ];

    /**
     * Relationship: Reservation belongs to a Membre
     */
    public function membre()
    {
        return $this->belongsTo(Membre::class);
    }

    /**
     * Relationship: Reservation belongs to a Seminaire
     */
    public function seminaire()
    {
        return $this->belongsTo(Seminaire::class);
    }
}
