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
                    'role_id'=>1,
                    'image'=>'test',
                ],
                [
                    'name'=>"Oussama Ghezal",
                    'email'=>'oussama@oussama.com',
                    'password' => Hash::make("oussama@oussama.com"),
                    'role_id'=>2,
                    'image'=>'test',
                ],
                [
                    'name'=>"Abdel Taouil",
                    'email'=>'abdel@abdel.com',
                    'password' => Hash::make("abdel@abdel.com"),
                    'role_id'=>3,
                    'image'=>'test',
                ],
                [
                    'name'=>"membre",
                    'email'=>'membre@membre.com',
                    'password' => Hash::make("membre@membre.com"),
                    'role_id'=>4,
                    'image'=>'test',
                ],
            ],
        );
    }
}
