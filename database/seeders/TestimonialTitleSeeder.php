<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimonialTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('testimonial_titles')->insert(
            [
                [
                    'titre'=>"WHAT OUR CLIENTS SAY",          
                ],
            ],
        );
    }
}
