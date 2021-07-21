<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = 
        [
            'name' => 'Darjo Gaming',
            'email' => 'admin@sitani.com',
            'password' => bcrypt('admin12345'),
            'role' => 'admin'
        ];
        User::insert($admin);

        $petani =
        [
            'name' => 'Khibar Pusaka',
            'email' => 'petani@sitani.com',
            'password' => bcrypt('petani12345'),
            'role' => 'petani'
        ];
        User::insert($petani);

        $tengkulak =
        [
            'name' => 'Hamzah Rizky',
            'email' => 'tengkulak@sitani.com',
            'password' => bcrypt('tengkulak12345'),
            'role' => 'tengkulak'
        ];
        User::insert($tengkulak);
    }
}
