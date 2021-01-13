<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert(
            [
                [
                    'image'=>'blog/blog-1.jpg',
                    'titre' => "JUST A SIMPLE BLOG POST",
                    'texte' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Phasellus vestibulum, quam tincidunt venenatis ultrices, est libero mattis ante, ac consectetur diam neque eget quam. Etiam feugiat augue et varius blandit. Praesent mattis, eros a sodales commodo.",
                    'user_id' =>1,
                    'statut' =>'authorized',
                    'created_at'=>'2021-01-09 09:18:33',
                ],
                [
                    'image'=>'blog/blog-2.jpg',
                    'titre' => "JUST A SIMPLE BLOG POST",
                    'texte' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Phasellus vestibulum, quam tincidunt venenatis ultrices, est libero mattis ante, ac consectetur diam neque eget quam. Etiam feugiat augue et varius blandit. Praesent mattis, eros a sodales commodo.",
                    'user_id' =>1,
                    'statut' =>'authorized',
                    'created_at'=>'2021-01-10 09:18:33',
                ],
                [
                    'image'=>'blog/blog-3.jpg',
                    'titre' => "JUST A SIMPLE BLOG POST",
                    'texte' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Phasellus vestibulum, quam tincidunt venenatis ultrices, est libero mattis ante, ac consectetur diam neque eget quam. Etiam feugiat augue et varius blandit. Praesent mattis, eros a sodales commodo.",
                    'user_id' =>2,
                    'statut' =>'authorized',
                    'created_at'=>'2021-01-12 09:18:33',
                ],
                [
                    'image'=>'blog/blog-3.jpg',
                    'titre' => "JUST A SIMPLE BLOG POST",
                    'texte' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Phasellus vestibulum, quam tincidunt venenatis ultrices, est libero mattis ante, ac consectetur diam neque eget quam. Etiam feugiat augue et varius blandit. Praesent mattis, eros a sodales commodo.",
                    'user_id' =>2,
                    'statut' =>'waiting',
                    'created_at'=>'2021-01-12 09:18:33',
                ],
            ],
        );
    }
}
