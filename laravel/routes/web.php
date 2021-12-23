<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/miperfil', function () {
    return view('miperfil');
});

Route::get('/admin', function () {
    return view('layout.admin');
});

