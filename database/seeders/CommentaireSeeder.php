<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('commentaires')->insert(
            [
                [
                    'texte'=>"c'est nul",
                    'article_id'=>1,
                    'user_id' =>1,
                    'created_at'=>'2021-01-11 09:18:33',
                ],
                [
                    'texte'=>"c'est pas mal",
                    'article_id'=>2,
                    'user_id' =>1,
                    'created_at'=>'2021-01-12 09:18:33',
                ],
                [
                    'texte'=>"c'est pas mal",
                    'article_id'=>2,
                    'user_id' =>1,
                    'created_at'=>'2021-01-12 09:18:33',
                ],
                [
                    'texte'=>"c'est pas mal",
                    'article_id'=>4,
                    'user_id' =>2,
                    'created_at'=>'2021-01-12 09:18:33',
                ],
            ],
        );
    }
}
