<?php

namespace App\Http\Controllers\Utils;

use App\Http\Controllers\Controller;

class GreetingTime extends Controller
{
    public static function greeting() : string
    {
        date_default_timezone_set("Asia//Jakarta");
        
        $greetingWord = "";
        $recentTime = date("G");

        if ($recentTime > 0 && $recentTime < 24) {
            if ($recentTime >= 3 && $recentTime < 12) {
                $greetingWord = "Look alive! 😲";
            } else if ($recentTime >= 12 && $recentTime < 17) {
                $greetingWord = "G’day mate! 🤓";
            } else if ($recentTime >= 17 && $recentTime < 19) {
                $greetingWord = "How’s it hanging?";
            } else {
                $greetingWord = "See ya’ in the mornin’!";
            }
        }

        return $greetingWord;
    } 
}