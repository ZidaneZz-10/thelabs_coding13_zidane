<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('team_titles')->insert(
            [
                [
                    'titre'=>"GET IN THE LAB AND MEET THE TEAM",          
                ],
            ],
        );
    }
}
