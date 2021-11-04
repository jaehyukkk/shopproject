<?php

use App\Http\Controllers\ShopController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\GoodsMgmController;
use App\Http\Controllers\SearchController;
use App\Models\Category1;
use App\Models\Goods;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    $data = Category1::all();
    $results = Goods::orderBy('id','desc')->paginate(6);
    return view('welcome',compact('data','results'));
})->name('main');

Route::get('/main/{category}',[ShopController::class,'index']);
Route::get('/main/{category}/{category2}',[ShopController::class,'sub']);
Route::get('/list/{id}',[ShopController::class,'desc']);


//회원가입
Route::get('/join',[UserController::class,'join']);
Route::post('/join',[UserController::class,'joinProcess']);
//로그인
Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/login',[UserController::class,'loginProcess']);
//로그아웃
Route::get('/logout',[UserController::class,'logout']);
//소셜로그인
Route::get('login/google',[UserController::class,'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback',[UserController::class,'handleGoogleCallback']);

//오더,카트
Route::middleware('auth')->group(function(){
    Route::get('/orderlist',[OrderController::class,'orderListIndex']);
    Route::get('/orderlist/{state}',[OrderController::class,'orderListIndexState']);
    Route::get('/cart/{id}',[OrderController::class,'cart']);
    Route::post('/orders',[OrderController::class,'orderPage']);
    Route::get('/cartprocess',[OrderController::class,'cartProcess']);
    Route::get('/orderinfo/{id}',[OrderController::class,'orderInfoPage']);
    Route::get('/resetpassword',[UserController::class,'getResetPassword']);
    Route::post('/resetpassword/{id}',[UserController::class,'postResetPassword']);
    Route::get('/resetinfo/{id}',[UserController::class,'getResetInfo']);
    Route::post('/edituser/{id}',[UserController::class,'editUser']);
    Route::get('/mypage/{id}',[UserController::class,'getMypage']);
});

//관리자 페이지
Route::middleware('levelcheck')->group(function(){
    Route::post('/goodsupload',[AdminController::class,'upload'])->name('postupload');
    Route::get('adminmain',[AdminController::class,'adminMain'])->name('dashboard');
    Route::get('/cateadd',[AdminController::class,'categoryAdd'])->name('addcategory');
    Route::get('/goodsupload',[AdminController::class,'index'])->name('getupload');
    Route::get('/goodsmgm',[GoodsMgmController::class,'index']);
    Route::get('/goodsupdate/{goods}',[GoodsMgmController::class,'edit']);
    Route::post('/goodsupdate',[GoodsMgmController::class,'update']);   
});

//검색
Route::get('/search',[SearchController::class,'search']);

Route::view('signup', 'signup');
Route::post('/review',[ReviewController::class,'store']);
    

//어드민









