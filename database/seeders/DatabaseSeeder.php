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
            RoleSeeder::class,
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
            ContactSeeder::class,
            ContactIntroSeeder::class,
            ServiceTitleSeeder::class,    
            TestimonialTitleSeeder::class,
            TagSeeder::class,
            CategorieSeeder::class,
            ArticleSeeder::class,
            ArticleTagSeeder::class,
            ArticleCategorySeeder::class,
            CommentaireSeeder::class,
            NewsletterSeeder::class,
            EmailSeeder::class,
        ]);
    }
}
