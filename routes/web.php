<?php

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Custom\ModelNotFound\CustomModelNotFound;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/users', function () {
    return User::all();
});

Route::get('/users/{user}', function (Request $request, User $user) {
    return $user;
});

Route::put('/users/{user}', function (Request $request, User $user) {
    return [
        $request->all(),
        $user
    ];
});

Route::get('/', function () {
    return view('welcome');
});
