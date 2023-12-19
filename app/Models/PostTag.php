<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'post_tags';
    protected $fillable = [
        'post_id', 
        'tag_id'
    ];
}