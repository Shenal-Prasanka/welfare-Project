<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RankController;
use App\Http\Controllers\RegementController;
use App\Http\Controllers\WelfareController;
use App\Http\Controllers\UnitController;
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
Route::group(['middleware'=>'admin'],function(){
    Route::get('rank', [RankController::class, 'show'])->name('rank');
    Route::get('rank/add', [RankController::class, 'add'])->name('rankadd');
    Route::post('rank/add', [RankController::class, 'store'])->name('rank.store');
    Route::get('rank/{id}', [RankController::class, 'active'])->name('rank.id');
    Route::get('rank/{id}/edit', [RankController::class, 'edit'])->name('rank.edit'); // Edit
    Route::post('rank/{id}/edit', [RankController::class, 'update'])->name('rank.update'); // Update
    Route::get('rank/{id}/view', [RankController::class, 'view'])->name('rank.view'); // View
    Route::get('rank/{id}/delete', [RankController::class, 'delete'])->name('rank.delete'); // Delete
});



//Define welfare  Route
    Route::group(['middleware'=>'admin'],function(){
    Route::get('welfare', [WelfareController::class, 'show'])->name('welfare');
    Route::get('welfare/add', [WelfareController::class, 'add'])->name('welfareadd');
    Route::post('welfare/add', [WelfareController::class, 'store'])->name('welfare.store');
    Route::get('welfare/{id}', [WelfareController::class, 'active'])->name('welfare.id');
    Route::get('welfare/{id}/edit', [WelfareController::class, 'edit'])->name('welfare.edit'); // Edit
    Route::post('welfare/{id}/edit', [WelfareController::class, 'update'])->name('welfare.update'); // Update
    Route::get('welfare/{id}/view', [WelfareController::class, 'view'])->name('welfare.view'); // View
    Route::get('welfare/{id}/delete', [WelfareController::class, 'delete'])->name('welfare.delete'); // Delete
});

//Define users  Route
    Route::group(['middleware'=>'admin'],function(){
    Route::get('user', [UserController::class, 'show'])->name('user');
    Route::get('user/add', [UserController::class, 'add'])->name('useradd');
    Route::post('user/add', [UserController::class, 'store'])->name('user.store');
    Route::get('user/{id}/edit', [UserController::class, 'edit'])->name('user.edit'); // Edit
    Route::post('user/{id}/edit', [UserController::class, 'update'])->name('user.update'); // Update
    Route::get('user/{id}/view', [UserController::class, 'view'])->name('user.view'); // View
    Route::get('user/{id}/delete', [UserController::class, 'delete'])->name('user.delete'); // Delete
});

//Define Regement  Route
    Route::group(['middleware'=>'admin'],function(){
    Route::get('regement', [RegementController::class, 'show'])->name('regement');
    Route::get('regement/add', [RegementController::class, 'add'])->name('regementadd');
    Route::post('regement/add', [RegementController::class, 'store'])->name('regement.store');
    Route::get('regement/{id}', [RegementController::class, 'active'])->name('regement.id');
    Route::get('regement/{id}/edit', [RegementController::class, 'edit'])->name('regement.edit'); // Edit
    Route::post('regement/{id}/edit', [RegementController::class, 'update'])->name('regement.update'); // Update
    Route::get('regement/{id}/view', [RegementController::class, 'view'])->name('regement.view'); // View
    Route::get('regement/{id}/delete', [RegementController::class, 'delete'])->name('regement.delete'); // Delete
});

//Define Unit  Route
    Route::group(['middleware'=>'admin'],function(){
    Route::get('unit', [UnitController::class, 'show'])->name('unit');
    Route::get('unit/add', [UnitController::class, 'add'])->name('unitadd');
    Route::post('unit/add', [UnitController::class, 'store'])->name('unit.store');
    Route::get('unit/{id}', [UnitController::class, 'active'])->name('unit.id');
    Route::get('unit/{id}/edit', [UnitController::class, 'edit'])->name('unit.edit'); // Edit
    Route::post('unit/{id}/edit', [UnitController::class, 'update'])->name('unit.update'); // Update
    Route::get('unit/{id}/view', [UnitController::class, 'view'])->name('unit.view'); // View
    Route::get('unit/{id}/delete', [UnitController::class, 'delete'])->name('unit.delete'); // Delete
});