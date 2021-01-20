<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service_titles')->insert(
            [
                [
                    'titre'=>"GET IN (THE LAB) AND SEE THE SERVICES",          
                ],
            ],
        );
    }
}
