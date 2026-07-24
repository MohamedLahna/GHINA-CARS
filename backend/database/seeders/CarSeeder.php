<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    \App\Models\Car::create([
        'marque' => 'Mercedes-Benz',
        'modele' => 'Classe S',
        'categorie' => 'Luxe',
        'prix' => 1500,
        'etat' => 'Disponible',
        'is_vip' => true,
        'description' => 'Accès exclusif pistes aéroports Maroc.'
    ]);
    
    \App\Models\Car::create([
        'marque' => 'Dacia',
        'modele' => 'Logan',
        'categorie' => 'Economique',
        'prix' => 300,
        'etat' => 'Disponible',
        'is_vip' => false
    ]);
}
}
