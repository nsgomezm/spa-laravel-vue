<?php

use App\Http\Controllers\Api\BaseCommentController;
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

Route::get('/test', [BaseCommentController::class, 'index']);
Route::view('/{any}', 'welcome')->where('any', '.*');

// Route::get('/', function () {
//     return view('welcome');
// });
