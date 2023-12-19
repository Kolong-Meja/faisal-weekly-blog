<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'post_categories';
    protected $fillable = [
        'post_id', 
        'category_id'
    ];
}