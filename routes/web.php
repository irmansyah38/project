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
use App\Http\Controllers\TataCaraController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
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


Route::get('/E-Tiket', [TransaksiController::class, 'index']);
Route::post('/E-Tiket', [TransaksiController::class, 'checkout'])->middleware('role:U');
Route::get('/invoice/{id}', [TransaksiController::class, 'invoice'])->middleware('role:U');

Route::get('/tata-cara-pembayaran', [TataCaraController::class, 'index']);


// Route::get('/E-Tiket', [TransaksiController::class, 'checkout'])->middleware('role:U');



Route::get('/admin', [AdminController::class, 'index'])->middleware('role:A');

Route::get('/foto-curug', [FotoController::class, 'index'])->middleware('role:A');
Route::post('/foto-curug', [FotoController::class, 'store'])->middleware('role:A');
Route::get('/foto-curug/{id}', [FotoController::class, 'destroy'])->middleware('role:A');
// Route::resource('/foto-curug', FotoController::class);

Route::get('/paragraf', [ParagrafController::class, 'index'])->middleware('role:A');
Route::post('/paragraf', [ParagrafController::class, 'update'])->middleware('role:A');
Route::get('/paragraf/{id}', [ParagrafController::class, 'edit'])->middleware('role:A');


Route::get('/FAQ', [FAQController::class, 'index'])->name('admin.faq')->middleware('role:A');
Route::post('/FAQ', [FAQController::class, 'store'])->middleware('role:A');
Route::get('/FAQ/new', [FAQController::class, 'create'])->middleware('role:A');
Route::post('/FAQ/update', [FAQController::class, 'update'])->middleware('role:A');
Route::get('/FAQ/{id}', [FAQController::class, 'edit'])->middleware('role:A');
Route::get('/FAQ/delete/{id}', [FAQController::class, 'destroy'])->middleware('role:A');

Route::get('/harga', [HargaController::class, 'index'])->middleware('role:A');
Route::post('/harga', [HargaController::class, 'update'])->middleware('role:A');


Route::get('/forgot-password', function () {
    return view('reset.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');


Route::get('/reset-password/{token}', function (string $token) {
    return view('reset.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');


Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        $request->only('password', 'password_confirmation', 'token'),

        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');
