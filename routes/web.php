<?php

use Illuminate\Support\Facades\Route;
// use App\Events\FormSubmitted;

Route::get('/pusher', function () {
    return view('index');
}); 

Route::get('/sender', function() {
    return view('sender');
});

Route::post('/sender', function() {
    $text = request()->text;
    // echo $text;
    event(new FormSubmitted($text));
});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// ---------------APPS-----------------------------//

Route::get('/{any}', function() {
    return view('containers.pages.index');
})->where('any', '.*');