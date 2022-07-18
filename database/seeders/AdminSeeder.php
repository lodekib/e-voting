<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'fname' => 'Mitchelle',
            'lname' => 'Chepngetich',
            'email' => 'mitchelle@gmail.com',
            'password' => Hash::make('mitchelle@gmail.com'),
            'dob' => '1995-02-04',
            'privilege' => 'superuser'
        ]);
    }
}
