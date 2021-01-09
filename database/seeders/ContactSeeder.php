<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert(
            [
                [
                    'titre' => "Main Office",
                    'lieu' => "C/ Libertad,05200 Arévalo",
                    'tel' => "0034 37483 2445 322",
                    'mail' => "hello@company.com",
                ],
            ],
        );
    }
}
