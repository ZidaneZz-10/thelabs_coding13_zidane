<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            [
                [
                    'titre' => "Vestibulum maximus",
                ],
                [
                    'titre' => "Nisi eu lobortis pharetra",
                ],
                [
                    'titre' => "Orci quam accumsan",
                ],
                [
                    'titre' => "Auguen pharetra massa",
                ],
                [
                    'titre' => "Tellus ut nulla",
                ],
                [
                    'titre' => "Etiam egestas viverra",
                ],
            ],
        );
    }
}
