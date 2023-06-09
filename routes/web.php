<?php

use UniSharp\LaravelFilemanager\Lfm;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RatingController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\LandingPage\HomeController;
use App\Http\Controllers\Admin\BookingCuciController;
use App\Http\Controllers\Admin\ProdukMobilController;
use App\Http\Controllers\Admin\SudahDicuciController;
use App\Http\Controllers\Admin\SedangDicuciController;
use App\Http\Controllers\Admin\UserCustomerController;
use App\Http\Controllers\Admin\UserKaryawanController;
use App\Http\Controllers\User\DashboardUserController;
use App\Http\Controllers\Admin\KategoriMobilController;
use App\Http\Controllers\LandingPage\BookingController;
use App\Http\Controllers\LandingPage\ContactController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\KategoriProdukController;
use App\Http\Controllers\Admin\TransactionBookingController;
use App\Http\Controllers\LandingPage\Home\HomeCarouselController;
use App\Http\Controllers\LandingPage\Home\HomeItemController;
use App\Http\Controllers\User\BookingCuciCustomerController;
use App\Http\Controllers\User\TransactionCustomerController;

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
Route::get('bookings', [BookingController::class, 'index'])->name('landingPage.booking');
Route::get('contact', [ContactController::class, 'indexLandingPage'])->name('landingPage.contact');

Route::resource('contact-landing-page', ContactController::class)->only([
    'index','store','update','destroy'
]);

Route::resource('home-carousel-landing-page', HomeCarouselController::class)->only([
    'index','store','update','destroy'
]);

Route::resource('home-body-landing-page', HomeItemController::class)->only([
    'index','store','update','destroy'
]);

// Route::resource('home-item-landing-page', HomeItemController::class)->only([
//     'index','store','update','destroy'
// ]);


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/generate-pdf-{id}', [TransactionBookingController::class,'ExportPDFTransaction'])->name('transaction-booking.pdf');

Route::resource('user-profile', ProfileController::class)->only([
    'index', 'update'
]);

Route::get('booking-cucis/{booking_id}/rating/create', [RatingController::class, 'create'])->name('booking-cucis.rating.create');
Route::post('booking-cucis/{booking_id}/rating/store', [RatingController::class, 'store'])->name('booking-cucis.rating.store');


Route::post('booking-cucis/customer/store', [BookingCuciCustomerController::class, 'store'])->name('booking-cucis-customer.store');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    // \UniSharp\LaravelFilemanager\Lfm::routes();
    Lfm::routes();
});

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/home', [DashboardUserController::class, 'index'])->name('user.home');

    Route::resource('transaction-customer', TransactionCustomerController::class)->only([
        'index', 'update', 'destroy'
    ]);

    Route::resource('booking-cuci-customer', BookingCuciCustomerController::class)->only([
        'index',  'update', 'destroy'
    ]);


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

    // Route::get('booking-cuci-sedang-dicuci', [BookingCuciController::class, 'indexSedangDicuci'])->name('booking-cuci.sedangDicuci');
    Route::resource('booking-cuci-sedang-dicuci', SedangDicuciController::class)->only([
        'index', 'update',
    ]);

    Route::resource('booking-cuci-selesai-dicuci', SudahDicuciController::class)->only([
        'index', 'update',
    ]);
    Route::get('/booking-cuci/{id}/send-whatsapp', [SudahDicuciController::class, 'sendWhatsAppMessage'])->name('booking-cuci-selesai-dicuci.sendWhatsapp');


    Route::put('booking-cuci-selesai-dicuci-update/{id}/update-status', [SudahDicuciController::class, 'updateStatusBayar'])->name('booking-cuci-selesai-dicuci.updateStatusBayar');

    Route::put('booking-cuci-sedang-dicuci-update/{id}/update-status', [SedangDicuciController::class, 'updateStatusCuci'])->name('booking-cuci-sedang-dicuci.updateStatusCuci');

    // Route::get('booking-cuci-selesai-dicuci', [BookingCuciController::class, 'indexSelesaiDicuci'])->name('booking-cuci.selesaiDicuci');
    Route::put('booking-cuci/{id}/update-status', [BookingCuciController::class, 'updateStatusCuci'])->name('booking-cuci.updateStatusCuci');

    Route::resource('transaction-booking', TransactionBookingController::class)->only([
        'index','show', 'update', 'destroy'
    ]);

    Route::get('/transaction-booking/{id}/send-whatsapp', [TransactionBookingController::class, 'sendWhatsAppMessageTransaction'])->name('transaction-booking.sendWhatsapp');

    Route::get('export-booking-cuci-mobil', [LaporanController::class, 'index'])->name('booking-cuci-export.index');
    Route::get('export-booking-cuci-mobil-csv', [LaporanController::class, 'exportBookingCuciMobilCSV'])->name('booking-cuci.exportCSV');
    Route::get('export-booking-cuci-mobil-pdf', [LaporanController::class, 'exportBookingCuciMobilPDF'])->name('booking-cuci.exportPDF');
    Route::post('export-booking-cuci-mobil-csv-custom', [LaporanController::class, 'exportBookingCuciMobilCustomCSV'])->name('booking-cuci.exportCustomCSV');
    Route::post('/export-booking-cuci-mobil-pdf-custom', [LaporanController::class, 'exportBookingCuciMobilCustomPDF'])->name('booking-cuci.exportCustomPDF');

     // Route::post('booking-cucis/{booking_id}/rating/store', [RatingController::class, 'store'])->name('booking-cucis.rating.store');
    // Route::post('booking-cucis/{booking}/rating/store', [RatingController::class, 'store'])->name('booking-cucis.rating.store');

});
