<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
        $users = [
            [
                'name'              => 'admin',
                'email'             => 'admin@gmail.com' ,
                'password'          => Hash::make('password'), // password
                'created_at'        => date("Y-m-d H:i:s"),
                'email_verified_at' => date("Y-m-d H:i:s"),
            ],
            [
                'name'              => 'Manager',
                'email'             => 'manager@gmail.com' ,
                'password'          => Hash::make('password'), // password
                'created_at'        => date("Y-m-d H:i:s"),
                'email_verified_at' => date("Y-m-d H:i:s"),
            ],

        ];
       foreach($users as $user){
           User::create($user);
       }

    }
}
