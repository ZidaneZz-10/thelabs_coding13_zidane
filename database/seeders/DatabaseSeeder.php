<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            NavbarSeeder::class,
            LogoSeeder::class,
            CarouselSeeder::class,
            TextCarouselSeeder::class,
            IconSeeder::class,
            ServiceSeeder::class,
            PresentationSeeder::class,
            VideoSeeder::class,
            ReadySeeder::class,
            TeamSeeder::class,
            TeamTitleSeeder::class,
            TestimonialSeeder::class,
        ]);
    }
}
