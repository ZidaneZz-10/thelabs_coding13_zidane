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
                    'image'=>"1.jpg",
                    'nom'=>"Zidane Ouldessayda",
                    'fonction'=>"CEO",
                ],
                [
                    'image'=>"2.jpg",
                    'nom'=>"Oussama Ghezal",
                    'fonction'=>"Marketing",
                ],
                [
                    'image'=>"3.jpg",
                    'nom'=>"Abdel Taouil",
                    'fonction'=>"Comptabilité",
                ],
            ],
        );
    }
}
