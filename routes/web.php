<?php

use Illuminate\Support\Facades\Route;

// Ruta de prueba
Route::get('/admin/test', function () {
    return 'Test OK';
});

// Grupo admin con nombre de rutas
Route::group([
    'prefix' => 'admin',
    'as'     => 'admin.',
], function () {
    // Controlador se pasa como 'Admin\ProductController'
    Route::resource('products', 'Admin\ProductController');
});

Route::view('/formtest', 'formtest');
Route::post('/testupload', function (Illuminate\Http\Request $request) {
    dd($request->file('image'));
});

