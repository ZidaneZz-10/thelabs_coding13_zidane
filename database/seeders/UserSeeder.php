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
        DB::table('users')->insert(
            [
                [
                    'name'=>"Zidane Ouldessayda",
                    'email'=>'admin@admin.com',
                    'password' => Hash::make("admin@admin.com"),
                ],
                [
                    'name'=>"Oussama Ghezal",
                    'email'=>'oussama@oussama.com',
                    'password' => Hash::make("oussama@oussama.com"),
                ],
            ],
        );
    }
}
