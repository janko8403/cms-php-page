<?php

namespace App\Classes;

class GeneratePass {

    public function randomPassword() {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass);
    }

    public function rememberToken() {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $token = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 25; $i++) {
            $n = rand(0, $alphaLength);
            $token[] = $alphabet[$n];
        }
        return implode($token);
    }

    public function randomColor() {
        $rand = str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT);
        return $rand;
    }

}


?>
