<?php

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/users', function (Request $request) {
    return User::all();
});

Route::get('/users/{user}', function (Request $request, User $user) {
    return $user;
});