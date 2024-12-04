<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seminaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'theme',
        'date_debut',
        'date_fin',
        'description',
        'cout_journalier',
        'animateur_id',
    ];

    /**
     * Relationship: Seminaire belongs to an Animateur
     */
    public function animateur()
    {
        return $this->belongsTo(Animateur::class);
    }

    /**
     * Relationship: Seminaire has many Activités
     */
    public function activites()
    {
        return $this->hasMany(Activite::class);
    }

    /**
     * Relationship: Seminaire belongs to many Membres through Reservations
     */
    public function membres()
    {
        return $this->hasMany(Membre::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
