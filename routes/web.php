<?php

use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\Api\PropertiesController as ApiPropertiesController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', PropertiesController::class);

Route::view('/ajax', 'app');
Route::post('/ajax', ApiPropertiesController::class);


