<?php

namespace App\Models;

use App\Enums\RoleStatus;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory, HasUuids;

    protected $table = "roles";

    protected $fillable = [
        'title', 
        'description', 
        'abilities', 
        'status',
    ];

    protected $casts = [
        'status' => RoleStatus::class
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'role_id');
    }
}
