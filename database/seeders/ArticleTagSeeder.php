<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('article_tag')->insert(
            [
                [
                    'article_id'=>1,
                    'tag_id' =>1,
                ],
                [
                    'article_id'=>1,
                    'tag_id' =>3,
                ],
                [
                    'article_id'=>1,
                    'tag_id' =>4,
                ],
                [
                    'article_id'=>2,
                    'tag_id' =>1,
                ],
                [
                    'article_id'=>3,
                    'tag_id' =>2,
                ],
                [
                    'article_id'=>3,
                    'tag_id' =>3,
                ],
                [
                    'article_id'=>3,
                    'tag_id' =>4,
                ],
                
            ],
        );
    }
}
