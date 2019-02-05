<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user= App\User::create([
            
            'email' => 'admin@pliv.dz',
            'nom' => 'admin',
            'prenom'=> 'admin',
            'password' => Hash::make('password'),
            'adresse' =>'adresse',
            'sexe'=>'homme',
            'age'=>25,
            'mobile' =>'mobile',
            'typeDeCompte'=>'admin'
        ]);
    }
}
