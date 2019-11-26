<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//create new user
Route::post("/user", "UserController@store");

//get all user
Route::get("/user", "UserController@index");

// update user according to user id
Route::put("/user/{id}", "UserController@update");

// view user according to user id
Route::get("/user/{id}", "UserController@view");

// delete user according to user id
Route::delete("/user/{id}", "UserController@delete");

Route::post("/todo", "TodoController@store");
Route::get("/todo/{user_id}", "TodoController@index");
