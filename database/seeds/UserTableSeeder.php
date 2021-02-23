<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        [
            'name' => 'GOST',
            'prenom' => 'Flash',
            'contacte' => '0000000000',
            'sexe' => 'H',
            'email' => 'admin@gmail.com',
            'password' => Hash::make("12345678"),
            'role_id' => '1',
            'departement_id' => '5',
            'titre_id' => '4',
        ],
        ]);
    }
}
