<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        //
        $user = [[
                'name'=>'Admin',
                'email'=>'admin@admin.com',
                'role'=>1,
                'password'=>Hash::make('password')
            ],
            [
                'name'=>'User',
                'email'=>'user@user.com',
                'role'=>2,
                'password'=>Hash::make('password')
            ]
            ];
            DB::table('users')->insert($user);
    }
}
