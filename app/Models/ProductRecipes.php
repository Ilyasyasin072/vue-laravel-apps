<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Products;
use App\Models\Items;
use App\Models\Inventoryin;

class ProductRecipes extends Model
{
    protected $table = 'product_recipes';

    public function product() {
        return $this->belongsTo(Products::class);
    }

    public function item() {
        return $this->belongsTo(Items::class);
    }

    public function inventoryin() {
        return $this->hasMany(Inventoryin::class);
    }
}
