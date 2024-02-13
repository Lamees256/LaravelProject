<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Http;
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
// Route::get('/', function(){
    
//     $response = Http::get("http://api.weatherstack.com/current?access_key=e6385d1001dfeca3b987736efd22eb29&query=Ramallah&units=m");
//     return view('index',[
//         'currentWeather'=>$response->json(),
//     ]);
// });

 Route::get('/',[ApplicationController::class,'index'])->name('index');
 Route::get('/{id}',[ApplicationController::class,'show'])->name('show');
 Route::get('/cats/{id}',[ApplicationController::class,'getByCats'])->name('category.get');
 Route::get('/posts/{id}',[ApplicationController::class,'getPost'])->name('post.view');
 Route::get('/search',[ApplicationController::class,'Search'])->name('post.search');
