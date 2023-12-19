<?php

namespace App\Http\Controllers\Utils;

use App\Http\Controllers\Controller;

class GreetingTime extends Controller
{
    public static function greeting() : string
    {
        date_default_timezone_set("Asia/Jakarta");
        
        $greetingWord = "";
        $recentTime = date("G");
    
        if ($recentTime > 0 && $recentTime < 24) {
            if ($recentTime >= 3 && $recentTime < 12) {
                $greetingWord = "Good Morning";
            } else if ($recentTime >= 12 && $recentTime < 17) {
                $greetingWord = "Good Afternoon";
            } else if ($recentTime >= 17 && $recentTime < 19) {
                $greetingWord = "Good Evening";
            } else {
                $greetingWord = "Good Night";
            }
        }

        return $greetingWord;
    } 
}