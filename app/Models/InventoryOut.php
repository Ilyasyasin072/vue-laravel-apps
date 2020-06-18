<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventoryOut extends Model
{
    protected $table = 'inventory_out';
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
