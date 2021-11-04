<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\GoodsMgmController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/catlist',[AdminController::class,'catList']);
Route::post('/addMainCategory',[AdminController::class,'addMainCategory']);
Route::post('/addsecondcategory',[AdminController::class,'addSecondCategory']);
Route::post('/getsccategory',[AdminController::class,'getSecondCategory']);
Route::post('/delcategory',[AdminController::class,'delCategory']);
Route::post('/orderprocess',[OrderController::class,'orderprocess']);
Route::post('/titleClick',[OrderController::class,'titleClick']);
Route::post('/statechg',[OrderController::class,'orderStateChg']);
Route::post('/checkid',[UserController::class,'checkId']);
Route::post('/ttt',[ReviewController::class,'ttt']);
Route::post('/updatereview',[ReviewController::class,'updataReview']);
Route::post('setnumber',[ShopController::class,'setNumber']);
Route::post('/reviewdel',[ReviewController::class,'reviewDel']);
Route::post('/goodsdel',[GoodsMgmController::class,'destroy']);

Route::post('/cartCheck',[OrderController::class,'cartCheck']);

Route::get('/getmgmcategory',[GoodsMgmController::class,'getMgmCategory']);









