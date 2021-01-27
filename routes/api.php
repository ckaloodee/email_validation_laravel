<?php

use Illuminate\Support\Facades\Route;

Route::post('register', 'RegisterController@create')->name('register')->middleware(['sanitize', 'trim']);
