<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $cast = [
        'status' => StatusEnum::class
    ];
    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
