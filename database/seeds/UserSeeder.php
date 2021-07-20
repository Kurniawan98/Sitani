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
        $data = ['name' => 'admin','email' => 'admin@admin.com','password' => bcrypt('admin12345'),'role' => 'admin'];
        User::insert($data);
    //     $admin = User::create([
    //         'name' => 'Admin',
    //         'email' => 'admin@sitani.com',
    //         'password' => bcrypt('12345678'),
    //     ]);

        // $admin->assignRole('admin');

    //     $petani = User::create([
    //         'name' => 'Petani',
    //         'email' => 'petani@sitani.com',
    //         'password' => bcrypt('12345678'),
    //     ]);

    //     $petani->assignRole('petani');

    //     $pengepul = User::create([
    //         'name' => 'Pengepul',
    //         'email' => 'pengepul@pengepul.com',
    //         'password' => bcrypt('12345678'),
    //     ]);

    //     $pengepul->assignRole('pengepul');
    }
}
