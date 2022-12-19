<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::truncate();

        $users =  [
            [
                'name'      => 'Administrator',
                'email'     => 'admin@admin.com',
                'password'  => bcrypt('password'),
                'role'      => 1
            ],
            [
                'name'      => 'Manager',
                'email'     => 'manager@manager.com',
                'password'  => bcrypt('password'),
                'role'      => 2
            ]
        ];

        User::insert($users);
        //User::create($users);
    }
}
