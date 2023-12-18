<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'categories';
    protected $fillable = [
        'title', 
        'meta_title', 
        'slug'
    ];

    protected $hidden = ['uuid'];

    // Relation with Post model
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'post_categories')->withTimestamps();
    }
}
