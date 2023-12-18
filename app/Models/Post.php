<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use App\Models\Image;

class Post extends Model
{
    use HasFactory, HasUuids;

    protected $table = "posts";
    
    protected $fillable = [
        'user_id', 
        'image', 
        'title', 
        'sub_title',
        'meta_title', 
        'slug', 
        'content', 
        'keywords',
        'status'
    ];

    protected $hidden = ['uuid'];

    // Relation with User model
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relation with Category model
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'post_categories', 'post_id', 'category_id')->withTimestamps();
    }

    // Relation with Tag model
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id')->withTimestamps();
    }

    // Relation with Image model
    public function images(): BelongsToMany
    {
        return $this->belongsToMany(Image::class, 'post_images', 'post_id', 'image_id')->withTimestamps();
    }

    // Keyword field mutator
    public function setKeywordAttribute($value)
    {
        $this->attribute['keywords'] = implode(', ', explode(' ', $value));
    }
}

?>