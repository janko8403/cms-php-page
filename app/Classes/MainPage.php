<?php

namespace App\Classes;
use App\Models\Page;
use Session;

class MainPage {

    private const path = 'page/';

    public function getMainPage() {
        $page = Page::where(['main_page' => 1, 'lng' => Session::get('locale')])->first();
        if($page == null) {
            return 'site-under-construction';
        }
        return self::path . $page->slug;
    }
}

?>