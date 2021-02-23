<?php

use Illuminate\Database\Seeder;

class TitreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('titres')->insert([
            [
                'libelle' => 'PDG'
            ],
            [
                'libelle' => 'DG'
            ],
            [
                'libelle' => 'DRC'
            ],
            [
                'libelle' => 'Directeur Departement'
            ],
        ]);
    }
}
