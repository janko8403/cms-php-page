<?php

namespace App\Classes;

class Country {

    private $countryList = array(
        "AT" => "Austria",
        "BY" => "Belarus",
        "BG" => "Bulgaria",
        "CN" => "China",
        "CZ" => "Czech Republic",
        "EE" => "Estonia",
        "FR" => "France",
        "DE" => "Germany",
        "IL" => "Israel",
        "IT" => "Italy",
        "LV" => "Latvia",
        "NO" => "Norway",
        "PL" => "Poland",
        "PT" => "Portugal",
        "RO" => "Romania",
        "RU" => "Russia",
        "RS" => "Serbia",
        "SK" => "Slovakia",
        "SI" => "Slovenia",
        "ES" => "Spain",
        "SZ" => "Swaziland",
        "SE" => "Sweden",
        "CH" => "Switzerland",
        "TR" => "Turkey",
        "UA" => "Ukraine",
        "EN" => "United Kingdom",
        "US" => "United States",
    );

    public function getAllCountry() {
        return $this->countryList;
    }

    public function getCountryByLowerCase($lng)
	{
        if(isset($this->countryList[$lng])){
            return $this->countryList[$lng];
        }
	}

}


?>