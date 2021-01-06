<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TextCarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('text_carousels')->insert(
            [
                [
                    'texte'=>"Get your freebie template now!",          
                ],
            ],
        );
    }
}
