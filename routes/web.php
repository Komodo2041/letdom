<?php

use Illuminate\Support\Facades\Route;

Route::get('/', "App\Http\Controllers\MainController@list");

Route::match(["get", "post"], '/sylabize/combine', "App\Http\Controllers\SylabeController@combineList");

Route::match(["get", "post"], '/erastotenessito100', "App\Http\Controllers\ErastotenesController@sito");

Route::match(["get", "post"], '/ppmcalc', "App\Http\Controllers\PpmCalculator@ppmcalc");
Route::match(["get", "post"], '/potega', "App\Http\Controllers\PpmCalculator@potega");
