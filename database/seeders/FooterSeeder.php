<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Footer;

class FooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $footer = new Footer();
        $footer->lng = "pl";
        $footer->address = "<p class='text-center text-md-left'>Centrum Pomocy Humanitarnej<br>ul. Lwowska 36,<br>37-700 Przemysł</p>";
        $footer->contact = "<p class='text-center text-md-right'><a href=''>tel. 22 475 643 564</a> <br><a href='mailto:pomoc.@cphprzemysl.pl'>e-mail: pomoc.@cphprzemysl.pl</a></p>";
        $footer->info = "Aktualnie CPH może przyjąć ponad 1500 Uchodźców i zorganizować transport dla podobnej liczby dziennie. Chętnych do wsparcia zapraszamy.";
        $footer->contact_info = "<h2 class='text-center text-black mt-4 mb-4'>Potrzebujesz pomocy?</h2><h2 class='text-center text-black mt-4 mb-4'>Daj nam o tym znać.</h2><h2 class='text-center text-black mt-5 mb-4'><strong>22 456 644 765</strong> </h2><p class='text-center mt-5 mb-4'><a class='text-href-bold' href='mailto:mail@cphprzemysl.pl'><strong>mail@cphprzemysl.pl</strong></a></p>";
        $footer->copyright = "Copyright 2022 Centrum Pomocy Humanitarnej w Przemyślu";
        $footer->save();
    }
}
