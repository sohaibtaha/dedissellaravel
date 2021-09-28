<?php

// use App\Models\Caravan;
use App\Http\Controllers\CaravanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::resource('caravans', CaravanController::class);

Route::get('/caravans/search/{name}',[CaravanController::class,'search']);

Route::group(['middlware'=>['auth:sanctum']] ,function () {
    // Route::get('/caravans/search/{name}',[CaravanController::class,'search']);

    //protected
});

// Route::get('/caravans',[CaravanController::class,'index']);
// Route::get('/caravans',function(){return Caravan::all();});
// Route::post('/caravans',[CaravanController::class,'store']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
