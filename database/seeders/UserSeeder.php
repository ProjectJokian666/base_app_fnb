<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['name'=>'SuperAdmin','email'=>'SuperAdmin@gmail.com','password'=>Hash::make('spradmn123'),'role'=>'SuperAdmin']);
        User::create(['name'=>'Owner','email'=>'Owner@gmail.com','password'=>Hash::make('123'),'role'=>'Owner']);
        User::create(['name'=>'Kasir1','email'=>'Kasir1@gmail.com','password'=>Hash::make('123'),'role'=>'Kasir']);
        User::create(['name'=>'Kasir2','email'=>'Kasir2@gmail.com','password'=>Hash::make('123'),'role'=>'Kasir']);
        User::create(['name'=>'Kasir3','email'=>'Kasir3@gmail.com','password'=>Hash::make('123'),'role'=>'Kasir']);
    }
}
