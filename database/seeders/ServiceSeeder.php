<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            [
                'titre' => 'Get in the lab',
                'texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..',
                'icon_id' => 1,
            ],
            [
                'titre' => 'Projects online',
                'texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..',
                'icon_id' => 2,
            ],
            [
                'titre' => 'SMART MARKETING',
                'texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..',
                'icon_id' => 3,
            ],
            [
                'titre' => 'Social Media',
                'texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..',
                'icon_id' => 4,

            ],
            [
                'titre' => 'Social Media',
                'texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..',
                'icon_id' => 5,

            ],
            [
                'titre' => 'Brainstorming',
                'texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..',
                'icon_id' => 6,

            ],
            [
                'titre' => 'Documented',
                'texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..',
                'icon_id' => 7,

            ],
            [
                'titre' => 'Responsive',
                'texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..',
                'icon_id' => 8,

            ],
            [
                'titre' => 'Retina ready',
                'texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..',
                'icon_id' => 9,

            ],
            [
                'titre' => 'Ultra modern',
                'texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..',
                'icon_id' => 10,

            ],
            [
                'titre' => 'et in the lab',
                'texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..',
                'icon_id' => 11,

            ],
            [
                'titre' => 'Projects online',
                'texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..',
                'icon_id' => 12,

            ],
            [
                'titre' => 'SMART MARKETING',
                'texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..',
                'icon_id' => 13,

            ],
            [
                'titre' => 'Get in the lab',
                'texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..',
                'icon_id' => 14,

            ],
            [
                'titre' => 'Projects online',
                'texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..',
                'icon_id' => 15,

            ],
            [
                'titre' => 'SMART MARKETING',
                'texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..',
                'icon_id' => 16,

            ],
        ]);
    }
}
