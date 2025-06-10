<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RankController;
use App\Http\Controllers\WelfareController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// This is your login page.
Route::get('/', function () {
    return view('auth.login'); 
});


// Define the home route
Route::get('/home', function () {
    return view('home');
})->name('home');


// Define the about route
Route::get('/about', function () {
    return view('about');
})->name('about');



Auth::routes();

//Loin routes
Route::get('login',[AuthController::class,'login'])->name ('login');
Route::post('login_post',[AuthController::class,'login_post'])->name ('login_post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Admin Dashboard Route
Route::group(['middleware'=>'admin'],function(){
    Route::get('admin/dashboard',[DashboardController::class,'dashboard']);
});

//User Dashbord Route
Route::group(['middleware'=>'user'],function(){
    Route::get('user/dashboard',[DashboardController::class,'dashboard']);
   
    
});

//unitclerk Dashbord Route
Route::group(['middleware'=>'unitclerk'],function(){
    Route::get('unitclerk/dashboard',[DashboardController::class,'dashboard']);
});

//unitoc Dashbord Route
Route::group(['middleware'=>'unitoc'],function(){
    Route::get('unitoc/dashboard',[DashboardController::class,'dashboard']);
});

//shopcoordclerk Dashbord Route
Route::group(['middleware'=>'shopcoordclerk'],function(){
    Route::get('shopcoordclerk/dashboard',[DashboardController::class,'dashboard']);
});

//shopcoordoc Dashbord Route
Route::group(['middleware'=>'shopcoordoc'],function(){
    Route::get('shopcoordoc/dashboard',[DashboardController::class,'dashboard']);
});

//welfareshopclerk Dashbord Route
Route::group(['middleware'=>'welfareshopclerk'],function(){
    Route::get('welfareshopclerk/dashboard',[DashboardController::class,'dashboard']);
});

//welfareshopoc Dashbord Route
Route::group(['middleware'=>'welfareshopoc'],function(){
    Route::get('welfareshopoc/dashboard',[DashboardController::class,'dashboard']);
});

//ledgerclerk Dashbord Route
Route::group(['middleware'=>'ledgerclerk'],function(){
    Route::get('ledgerclerk/dashboard',[DashboardController::class,'dashboard']);
});

//ledgeroc Dashbord Route
Route::group(['middleware'=>'ledgeroc'],function(){
    Route::get('ledgeroc/dashboard',[DashboardController::class,'dashboard']);
});

// Define the profile.show route
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');

// Define the users.index route
Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//profile identify their own dashboard
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

//Define Rank  Route
    Route::get('rank', [RankController::class, 'show'])->name('rank');
    Route::get('rank/{id}', [RankController::class, 'active'])->name('rank.id');
    Route::get('rank/add', [RankController::class, 'add'])->name('rank.add');
    Route::post('rank/store', [RankController::class, 'store'])->name('rank.store');
    



//Define welfare  Route
Route::get('/welfare', [WelfareController::class, 'show'])->name('welfare');