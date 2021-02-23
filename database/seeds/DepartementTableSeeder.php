<?php

use Illuminate\Database\Seeder;

class DepartementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departements')->insert([
            [
                'name' => 'Direction'
            ],
            [
                'name' => 'RH'
            ],
            [
                'name' => 'Comptabilité'
            ],
            [
                'name' => 'Commertiale'
            ],
            [
                'name' => 'Informatique'
            ],
        ]);
    }
}
