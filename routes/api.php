<?php

// use App\Models\Caravan;
use App\Http\Controllers\CaravanController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;

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
// Route::resource('caravans', CaravanController::class);

// Route::post('/login', 'AuthController:@login');
// Route::post('/reset-password',[AuthController::class,'resetpassword']);
// 
Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation','token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );});
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::get('/caravans',[CaravanController::class,'index']);
Route::get('/caravans/search/{name}',[CaravanController::class,'search']);
Route::post('/caravans',[CaravanController::class,'store']);
Route::put('/caravans/{id}',[CaravanController::class,'update']);
Route::delete('/caravans/{id}',[CaravanController::class,'destroy']);
Route::get('/caravans/{id}',[CaravanController::class,'show']);
Route::post('/logout',[AuthController::class,'logout']);


//Protected
// Route::group(['middleware'=>['auth:sanctum']] ,function () {
//     Route::post('/caravans',[CaravanController::class,'store']);
//     Route::put('/caravans/{id}',[CaravanController::class,'update']);
//     Route::delete('/caravans/{id}',[CaravanController::class,'destroy']);
//     Route::get('/caravans/{id}',[CaravanController::class,'show']);
//     Route::post('/logout',[AuthController::class,'logout']);

// });

// Route::get('/caravans',function(){return Caravan::all();});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
