<?php

use Illuminate\Support\Facades\Route;
use Illuminate\config;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\MoneyController;
use App\Models\User;
use Illuminate\Support\Str;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('main');
})->middleware('auth')->name('main_en');

Route::get('/ar', function () {
    return view('main-ar');
})->middleware('auth')->name('main_ar');

Route::get('/tr', function () {
    return view('main-tr');
})->middleware('auth')->name('main_tr');

Route::get('/register' , function(){
    return view("auth/register");
})->name('register');

Route::get('/login' , function(){
    return view("auth/login");
})->name('login');

Route::get('/dashboard' , function(){
    return view('dashboard');
})->middleware('auth');

Route::post('/register' , [AuthController::class , 'register'])->name('RegisterUser');
Route::post('/login' , [AuthController::class , 'login'])->name('LoginUser');
Route::post('/logout' , [AuthController::class , 'logout'])->name('logout');

Route::resource('office' , OfficeController::class)->middleware('auth');
Route::resource('money' , MoneyController::class)->middleware('auth');


Route::get('/per/{id}' , function($id){
    $user = User::findOrFail($id);
    if($user->hasRole('admin')){
         return   "this user is Admin";
    }else{
        return "this user is leader";
    }
});

Route::get('/language/{locale}' , function($locale){
    if(in_array($locale , ['ar' , 'en' , 'tr'])){
        session()->put('locale' , $locale);
    }
    return redirect()->back();
})->name('language');


Route::get('/generate-tokrn/{id}' , function($id){
    $user = User::findOrFail($id);
    $user->api_token = Str::random(20);
    $user->save();
    return redirect()->back();
})->name('generate');

Route::get('/profile' , [AuthController::class , 'profile'])->name('profile');
Route::get('/convert' , function()
{
    return view('offices.transconvert');
})->name('convert');

