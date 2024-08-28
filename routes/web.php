<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/create_edit_article', function () {
    return view('create_edit_article');
});

Route::get('/article', function () {
    return view('article');
});