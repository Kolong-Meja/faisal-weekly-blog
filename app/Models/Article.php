<?php

namespace App\Models;

use App\Enums\ArticleStatus;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'articles';

    protected $fillable = [
        'user_id',
        'title',
        'meta_title',
        'slug',
        'description',
        'meta_description',
        'content',
        'status',
    ];

    protected $casts = [
        'status' => ArticleStatus::class
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'article_categories', 'article_id', 'category_id')->withTimestamps();
    }
}
