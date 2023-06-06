<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\LandingPage\HomeController;
use App\Http\Controllers\Admin\BookingCuciController;
use App\Http\Controllers\Admin\ProdukMobilController;
use App\Http\Controllers\Admin\UserCustomerController;
use App\Http\Controllers\Admin\UserKaryawanController;
use App\Http\Controllers\User\DashboardUserController;
use App\Http\Controllers\Admin\KategoriMobilController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\KategoriProdukController;
use App\Http\Controllers\LandingPage\ServicesController;
use App\Http\Controllers\Admin\TransactionBookingController;

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

// Route::get('/', function () {
//     return view('landing_page.landingPage');
// });

Route::get('/', [HomeController::class, 'index'])->name('landingPage.home');
Route::get('services', [ServicesController::class, 'index'])->name('landingPage.services');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';




/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/home', [DashboardUserController::class, 'index'])->name('user.home');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('admin/home', [DashboardAdminController::class, 'index'])->name('admin.home');

    Route::resource('user-admin', UserAdminController::class);
    Route::resource('user-karyawan', UserKaryawanController::class);
    Route::resource('user-customer', UserCustomerController::class);

    Route::resource('kategori-produk', KategoriProdukController::class);
    Route::resource('kategori-mobil', KategoriMobilController::class);

    Route::resource('produk-mobil', ProdukMobilController::class);
    Route::resource('booking-cuci', BookingCuciController::class)->only([
        'index', 'store', 'show', 'update', 'destroy'
    ]);

    Route::get('booking-cuci-sedang-dicuci', [BookingCuciController::class, 'indexSedangDicuci'])->name('booking-cuci.sedangDicuci');
    Route::get('booking-cuci-selesai-dicuci', [BookingCuciController::class, 'indexSelesaiDicuci'])->name('booking-cuci.selesaiDicuci');
    Route::put('booking-cuci/{id}/update-status', [BookingCuciController::class, 'updateKaryawan'])->name('booking-cuci.updateKaryawan');

    Route::resource('transaction-booking', TransactionBookingController::class)->only([
        'index', 'store', 'show', 'update', 'destroy'
    ]);
});
