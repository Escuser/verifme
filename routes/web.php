<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImpersonateController;
use App\Http\Controllers\Products\ProductsController;
use App\Http\Controllers\Services\CoinPaymentController;

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



Route::prefix('/')->group(base_path('routes/web/users.php'));


Route::middleware('admin')->prefix('/admin')->group(base_path('routes/web/admin.php'));
Route::middleware('seller')->prefix('/seller')->group(base_path('routes/web/seller.php'));

Route::any('coinpayment/ipn', [CoinPaymentController::class, 'handleIPN'])->name('coinpayment.ipn');

Route::middleware('auth')->prefix('/products')->group(function () {
    Route::post('/buy', [ProductsController::class, 'buy'])->name('products.buy');
    Route::get('/accounts', [ProductsController::class, 'accounts'])->name('products.accounts');
    Route::get('/gateways', [ProductsController::class, 'gateways'])->name('products.gateways');
    Route::get('/wallets', [ProductsController::class, 'wallets'])->name('products.wallets');
    Route::get('/rdps-vps', [ProductsController::class, 'rdps'])->name('products.rdps');
    Route::get('/hostings', [ProductsController::class, 'hostings'])->name('products.hostings');
    Route::get('/smtps', [ProductsController::class, 'smtps'])->name('products.smtps');
    Route::get('/leads', [ProductsController::class, 'leads'])->name('products.leads');
});


Route::prefix('/affiliate')->group(base_path('routes/web/affiliate.php'));
Route::prefix('/support')->group(base_path('routes/web/support.php'));

Route::middleware('auth')->get('/impersonation/end', [ImpersonateController::class, 'leave'])->name('leave-impersonation');
Route::middleware('admin')->get('/impersonation/start/{id}', [ImpersonateController::class, 'start'])->name('start-impersonation');






Route::get('/', function () {    
    return view('welcome');
})->name('home')->middleware('auth');

Route::fallback(function (Request $request) {
    return "404";
})->name('404')->middleware('auth');
