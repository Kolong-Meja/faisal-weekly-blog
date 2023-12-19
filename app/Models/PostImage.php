<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    use HasFactory, HasUuids;

    protected $table = "post_images";
    protected $fillable = [
        "post_id", 
        "image_id"
    ];
}