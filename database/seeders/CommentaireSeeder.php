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
                    'user_id' =>1,
                ],
                [
                    'texte'=>"c'est pas mal",
                    'user_id' =>1,
                ],
            ],
        );
    }
}
