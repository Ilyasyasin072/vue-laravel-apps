<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventoryOut;

class InventoryOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventory_out = InventoryOut::with(['productRecipes', 'productRecipes.product', 'productRecipes.item'])->orderBy('created_at', 'DESC')->get();

        try {
            return response()->json($inventory_out);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inventory_out = new InventoryOut();

        $inventory_out->product_recipes_id = $request->product_recipes_id;
        $inventory_out->stock_out = $request->stock_out;

        try {
            $inventory_out->save();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventory_out = InventoryOut::find($id);

        try {
            $inventory_out->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
