<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisteredAssociationController;
use Illuminate\Support\Facades\Route;
use App\Models\Association;

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
    return view('home');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('newassociation', [RegisteredAssociationController::class, 'index'])->name('newassociation');
Route::post('newassociation', [RegisteredAssociationController::class, 'store'])->name('newassociation.store');

// Route Model Binding con custom key (usata la colonna "name" invece della default "id").
// Permette di restituire la View, solo se vi è una corrispondenza con il parametro nella URL ("name") 
// ed una associazione esistente nel DB
Route::get('/association/{association:name}/{user_type?}', function(Association $association, int $user_type = null) {
    $model = [
        'name' => $association->name,
        'user_type' => $user_type,
    ];
    return view('association', $model);
})->name('association');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
