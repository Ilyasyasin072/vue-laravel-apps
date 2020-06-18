<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductRecipes;
class Products extends Model
{
    protected $table = 'product';

    public function productrecipes() {
        return $this->hasMany(ProductRecipes::class);
    }
}
