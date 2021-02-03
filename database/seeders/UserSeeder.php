<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specialites')->insert([
            'libelle' => 'Generaliste',
            'nbr_max' => '10'
        ]);
        DB::table('users')->insert([
            'nom' => "Mohammed",
            'prenom' => "Hamadi",
            'adresse' => 'Maghnia azzouni bp 730 13330 ',
            'email' => 'mohahmd16@gmail.com',
            'login' => 'admin',
            'password' => bcrypt('admin'),
            'spec_id' => '1',
            'grade' => 'admin',
            'date_naissance' =>'1998-03-27'
        ]);
    }
}
