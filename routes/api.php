<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        // Below mention routes are public, user can access those without any restriction.
        // Create New User
        Route::post('register', 'AuthController@register');
        // Login User
        Route::post('login', 'AuthController@login');
        
        // Refresh the JWT Token
        Route::get('refresh', 'AuthController@refresh');
        
        // Below mention routes are available only for the authenticated users.
        Route::middleware('auth:api')->group(function () {
            // Get user info
            Route::get('user', 'AuthController@user');
            // Logout user from application
            Route::post('logout', 'AuthController@logout');
        });
    });
});

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Items
    
Route::get('items','ItemController@index');
Route::delete('items/{id}', 'ItemController@destroy');
Route::post('items/create', 'ItemController@store');
Route::put('items/update/{id}','ItemController@update');
Route::get('items/detail/{id}', 'ItemController@edit');

// Products

Route::get('products', 'ProductController@index');
Route::post('products/store','ProductController@store');
Route::delete('products/delete/{id}', 'ProductController@destroy');
Route::get('products/edit/{id}','ProductController@edit');
Route::put('products/update/{id}','ProductController@update');

// Transactions

Route::get('transaction', 'TransactionController@index');
Route::post('transaction/create','TransactionController@store');
Route::delete('transaction/delete/{id}','TransactionController@destroy');

//product recipes

Route::get('product/recipes', 'ProductRecipesController@index');
Route::post('product/recipes/create', 'ProductRecipesController@store');
Route::delete('product/recipes/delete/{id}', 'ProductRecipesController@destroy');

//Inventory In

Route::get('inventory/in', 'InventoryInController@index');
Route::post('inventory/in/create', 'InventoryInController@store');
Route::delete('inventory/in/delete/{id}', 'InventoryInController@destroy');

// inventory out

Route::get('inventory/out', 'InventoryOutController@index');
Route::post('inventory/out/create', 'InventoryOutController@store');
Route::delete('inventory/out/delete/{id}', 'InventoryOutController@destroy');

// Report 

Route::get('report/inventory', 'ReportController@index');
