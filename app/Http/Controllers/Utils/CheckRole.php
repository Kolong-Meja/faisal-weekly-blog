<?php

namespace App\Http\Controllers\Utils;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckRole extends Controller
{
    public static function userRole(): string
    {
        $authUserWithRole = optional(Auth::user())->role()->get();

        $authUserRole = "";

        foreach($authUserWithRole as $userRole) {
            $authUserRole = $userRole->title;
        }

        return $authUserRole;
    }
}