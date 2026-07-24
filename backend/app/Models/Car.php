<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'marque',
        'modele',
        'categorie',
        'prix',
        'etat',
        'image',
        'is_vip',
        'date_debut_location',
        'date_fin_location',
        'disponibilite'
    ];

    protected $appends = ['statut_actuel'];


    public function getStatutActuelAttribute()
    {
        if (!$this->disponibilite && $this->date_debut_location == null) {
            return 'Maintenance';
        }

        if ($this->date_debut_location && $this->date_fin_location) {
            $now = \Carbon\Carbon::now()->startOfDay();
            $debut = \Carbon\Carbon::parse($this->date_debut_location)->startOfDay();
            $fin = \Carbon\Carbon::parse($this->date_fin_location)->endOfDay();

            if ($now->between($debut, $fin)) {
                return 'Louée jusqu\'au ' . \Carbon\Carbon::parse($this->date_fin_location)->format('d/m/Y');
            }
        }

        return 'Disponible';
    }
}
