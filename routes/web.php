<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homecontroller;
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\movieController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!

->middleware('auth')
|
*/

Route::get('/', function () {
    return view('pages.home.welcome');
});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', homecontroller::class);
//     })->name('dashboard');
// Route::resource('/', homecontroller::class);
Route::resource('showmovie', movieController::class);
Route::get('moviedetail/{id}', [movieController::class, 'movie_details']);
Route::get('addbooking', [movieController::class, 'addbooking']);


Route::resource('contact',ContactController::class);




Route::get('dashboard',[admincontroller::class, 'index'])->middleware('auth');

route::get('addcinema', [admincontroller::class, 'addcinema']);
route::get('addmovie', [admincontroller::class, 'addmovie']);
route::get('addticketclasses', [admincontroller::class, 'addticketclasses']);
route::get('addshow', [admincontroller::class, 'addshow']);
route::get('insertshow', [admincontroller::class, 'insertshow']);




route::post('insertcinema',[admincontroller::class,'insertcinema']);
Route::get('editcinema/{id}',[admincontroller::class,'editcinema']);
Route::post('updcinema',[admincontroller::class,'updcinema']);

route::get('editmovie/{id}',[admincontroller::class,'editmovie']);
route::post('updmovie',[admincontroller::class,'updmovie']);

route::post('insertmovie',[admincontroller::class,'insertmovie']);

route::post('insertticketclasses',[admincontroller::class,'insertticketclasses']);
Route::get('editticketclasses/{id}',[admincontroller::class,'editticketclasses']);
Route::post('updticketclasses',[admincontroller::class,'updticketclasses']);

route::get('addreview', [admincontroller::class, 'addreview']);

route::get('addbooking', [admincontroller::class, 'addbooking']);
route::get('insertbooking', [admincontroller::class, 'insertbooking']);

