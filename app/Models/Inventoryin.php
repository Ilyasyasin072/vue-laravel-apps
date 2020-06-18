<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductRecipes;
use App\Models\Products;
use App\Models\Items;
class Inventoryin extends Model
{
    protected $table = 'inventory_in';

    public function productRecipes() {
        return $this->belongsTo(ProductRecipes::class);
    }

    public function product() {
        return $this->belongsTo(Products::class);
    }

    public function item() {
        return $this->belongsTo(Items::class);
    }
}
