<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function inventory(): HasMany
    {
        return $this->hasMany(Inventory::class);
    }
}
