<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('emails')->insert(
            [
                [
                    'name'=>'Zidane Ouldessayda',
                    'email' => "ouldessayda@gmail.com",
                    'subject' => "info sur une formation",
                    'message' =>"c'est pour demander des renseignements sur la formation de web dev",
                    'created_at'=>'2021-01-09 09:18:33',
                ],
                [
                    'name'=>'Oussama Ghezal',
                    'email' => "oussama@hotmail.com",
                    'subject' => "money",
                    'message' =>"on est payer combien par mois?",
                    'created_at'=>'2021-01-10 09:18:33',
                ],
            ],
        );
    }
}
