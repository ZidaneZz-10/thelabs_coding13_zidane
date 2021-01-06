<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IconSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('icons')->insert([
            [
                'lien' => 'flaticon-023-flask',
            ],
            [
                'lien' => 'flaticon-011-compass',
            ],
            [
                'lien' => 'flaticon-037-idea',
            ],
            [
                'lien' => 'flaticon-039-vector',
            ],
            [
                'lien' => 'flaticon-039-vector',
            ],
            [
                'lien' => 'flaticon-036-brainstorming',
            ],
            [
                'lien' => 'flaticon-026-search',
            ],
            [
                'lien' => 'flaticon-018-laptop-1',
            ],
            [
                'lien' => 'flaticon-043-sketch',
            ],
            [
                'lien' => 'flaticon-012-cube',
            ],
            [
                'lien' => 'flaticon-002-caliper',
            ],
            [
                'lien' => 'flaticon-019-coffee-cup',
            ],
            [
                'lien' => 'flaticon-025-imagination',
            ],
            [
                'lien' => 'flaticon-037-idea',
            ],
            [
                'lien' => 'flaticon-020-creativity',
            ],
            [
                'lien' => 'flaticon-008-team',
            ],
        ]);
    }
}
