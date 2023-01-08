<?php

use Illuminate\Support\Facades\Route;
use App\Models\Barang;
use App\Http\Controllers\BarangController;

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
    $barangs = Barang::all();
    $jumlahBarang = count(Barang::all());
    return view('home', compact('barangs','jumlahBarang'));
});

Route::get('/dashboard', function () {
    $barangs = count(Barang::all());
    return view('layouts.app_admin.index', compact('barangs'));
})->middleware(['auth'])->name('dashboard');

Route::resource('barang', BarangController::class);

require __DIR__.'/auth.php';