<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginContoller;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\ParagrafController;
use App\Models\Foto;
use App\Models\Paragraf;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\TransaksiController;
use App\Models\FAQ;
use App\Http\Controllers\HargaController;


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

    return view('user.home', [
        'title' => "Home",
        "data" => Auth::user(),
        'images' => Foto::latest(),
        'paragraf' => Paragraf::all()->toArray(),
        'faqs' => FAQ::all()->toArray()

    ]);
});

Route::get('/register', [RegisterController::class, 'index'])->middleware("guest");
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginContoller::class, 'index'])->name('login')->middleware("guest");
Route::post('/login', [LoginContoller::class, 'authenticate']);
Route::post('/logout', [LoginContoller::class, 'logout']);

// Route::get('/E-Tiket', [EtiketController::class, 'index']);
// Route::post('/E-Tiket', [EtiketController::class, 'beli']);

Route::get('/E-Tiket', [TransaksiController::class, 'index']);
Route::post('/E-Tiket', [TransaksiController::class, 'checkout'])->middleware('role:U');
Route::get('/invoice/{id}', [TransaksiController::class, 'invoice'])->middleware('role:U');

// Route::get('/E-Tiket', [TransaksiController::class, 'checkout'])->middleware('role:U');



Route::get('/admin', [AdminController::class, 'index'])->middleware('role:A');

Route::get('/foto-curug', [FotoController::class, 'index'])->middleware('role:A');
Route::post('/foto-curug', [FotoController::class, 'store'])->middleware('role:A');
// Route::get('/foto-curug/{id}', [FotoController::class, 'destroy'])->middleware('role:A');
Route::resource('/foto-curug', FotoController::class);

Route::get('/paragraf', [ParagrafController::class, 'index'])->middleware('role:A');
Route::post('/paragraf', [ParagrafController::class, 'update'])->middleware('role:A');
Route::get('/paragraf/{id}', [ParagrafController::class, 'edit'])->middleware('role:A');


Route::get('/FAQ', [FAQController::class, 'index'])->middleware('role:A');
Route::post('/FAQ', [FAQController::class, 'store'])->middleware('role:A');
Route::get('/FAQ/{id}', [FAQController::class, 'edit'])->middleware('role:A');
Route::get('/FAQ/new', [FAQController::class, 'create'])->middleware('role:A');
Route::get('/FAQ/delete/{id}', [FAQController::class, 'destroy'])->middleware('role:A');

Route::get('/harga', [HargaController::class, 'index'])->middleware('role:A');
Route::post('/harga', [HargaController::class, 'update'])->middleware('role:A');
