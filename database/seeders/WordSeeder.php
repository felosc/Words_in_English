<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('words')->insert([

            [
                'word' => "the",
                'w_spanih' => "el, la, los, las"
            ],
            [
                'word' => "be",
                'w_spanih' => "ser o estar"
            ],
            [
                'word' => "to",
                'w_spanih' => "a, hacia, hasta, por, para"
            ],
            [
                'word' => "of",
                'w_spanih' => "de"
            ],
            [
                'word' => "and",
                'w_spanih' => "y"
            ],
            [
                'word' => "a",
                'w_spanih' => "un, una"
            ],
            [
                'word' => "in",
                'w_spanih' => "en, dentro de"
            ],
            [
                'word' => "that",
                'w_spanih' => "que, eso/e/a, aquello/a, cual"
            ],
            [
                'word' => "have",
                'w_spanih' => "tener, haber"
            ],
            [
                'word' => "I",
                'w_spanih' => "yo"
            ],
            [
                'word' => "it",
                'w_spanih' => "él, lo, la (cosa, animal), eso, esto"
            ],

        ]);
    }
}
