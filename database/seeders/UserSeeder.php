<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
                'name'      => 'Manager',
                'role'     => 'manager',
                'email'     => 'Manager@gmail.com',
                'password'  =>  bcrypt('inimanager'),
            ],
            [
                'name'      => 'Admin',
                'role'     => 'admin',
                'email'     => 'Admin@gmail.com',
                'password'  =>  bcrypt('iniadmin'),
            ],

        ];
        foreach ($userData as $key => $val) {
            User::create($val);
        }

    }
}
