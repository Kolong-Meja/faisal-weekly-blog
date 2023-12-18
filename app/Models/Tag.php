<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use App\Models\Post;

class Tag extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'tags';
    protected $fillable = [
        'title', 
        'meta_title', 
        'slug'
    ];
    protected $hidden = ['uuid'];

    // Relation with Post model
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'post_tags', 'tag_id', 'post_id')->withTimestamps();
    }
}
