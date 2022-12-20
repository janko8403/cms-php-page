<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Language;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lng = new Language();
        $lng->lng = "pl";
        $lng->long_lng = "Poland";
        $lng->sort = 1;
        $lng->save();
    }
}
