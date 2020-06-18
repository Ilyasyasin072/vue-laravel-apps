<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductRecipes;
class ProductRecipesController extends Controller
{
    public function index()
    {
        // $product_recipes = ProductRecipes::all();
        $product_recipes = ProductRecipes::with(['product','item'])->orderBy('created_at', 'DESC')->get();
        // $product_recipes = \DB::table('product_recipes')->leftJoin('items', 'items.id', '=', 'product_recipes.item_id')->get();

        return response()->json($product_recipes);
    }

    public function store(Request $request) {

        $product_recipes = new ProductRecipes();

        $product_recipes->product_id = $request->product_id;
        $product_recipes->item_id = $request->item_id;

        try {
            $product_recipes->save();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy($id) {
        
        $product_recipes = ProductRecipes::find($id);

        try {
            $product_recipes->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
