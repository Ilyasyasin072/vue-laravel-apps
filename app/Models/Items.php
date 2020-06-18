<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\ProductRecipes;

class Items extends Model
{
    protected $table = 'item';

    public function productrecipes() {
        return $this->hasMany(ProductRecipes::class);
    }

    // // membuat funtion untuk parse tanggal
    // public function getCreatedat()
    // {
    //     setlocale(LC_TIME, 'id_ID.utf-8');
    //     return Carbon::parse($this->attribute['created_at'])->formatLocalized('%H:%S %A, %d %B %Y');
    // }

    // public function getUpdatedat()
    // {
    //     setlocale(LC_TIME, 'id_ID.utf-8');
    //     return Carbon::parse($this->attribute['updated_at'])->formatLocalized('%H:%S %A, %d %B %Y');
    // }
}
