<?php

namespace App\Enums;

enum ArticleStatus:string {
    case PENDING = "pending";
    case PUBLISHED = "published";
}
