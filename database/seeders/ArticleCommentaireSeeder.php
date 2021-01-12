<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleCommentaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('article_commentaire')->insert(
            [
                [
                    'article_id'=>1,
                    'commentaire_id' =>1,
                ],
                [
                    'article_id'=>1,
                    'commentaire_id' =>2,
                ],
                [
                    'article_id'=>2,
                    'commentaire_id' =>1,
                ],
                [
                    'article_id'=>3,
                    'commentaire_id' =>1,
                ],
                [
                    'article_id'=>3,
                    'commentaire_id' =>2,
                ],
            ],
        );
    }
}
