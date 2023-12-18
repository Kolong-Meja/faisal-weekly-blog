<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Post;

class Image extends Model
{
    use HasFactory, HasUuids;

    protected $table = "images";
    protected $fillable = [
        "image", 
        "owner", 
        "url",
    ];

    protected $hidden = ['uuid'];

    // Relation with Post model
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'post_images', 'image_id', 'post_id')->withTimestamps();
    }
}