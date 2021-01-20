<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert(
            [
                [
                    'user_id'=>1,
                    'fonction'=>"CEO",
                ],
                [
                    'user_id'=>2,
                    'fonction'=>"Marketing",
                ],
                [
                    'user_id'=>3,
                    'fonction'=>"Comptabilité",
                ],
            ],
        );
    }
}
