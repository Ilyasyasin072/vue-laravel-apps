<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventoryin;

class InventoryInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventoryin = Inventoryin::with(['productrecipes.product','productrecipes.item'])->orderBy('created_at', 'DESC')->get();
        
        try {
            return response()->json($inventoryin);
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
        $inventoryin = New Inventoryin();

        $inventoryin->product_recipes_id = $request->product_recipes_id;
        $inventoryin->stock_in = $request->stock_in;

        try {
            $inventoryin->save();
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
        $inventoryin = InventoryIn::find($id);

        try {
            $inventoryin->delete();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
