<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NavbarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('navbars')->insert(
            [
                [
                    'elem1'=>"Home",
                    'elem2'=>"Services",
                    'elem3'=>"Blog",
                    'elem4'=>"Contact",
                ],
            ],
        );
    }
}
