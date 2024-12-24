<?php

use App\Http\Controllers\admin\CustomerController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\frontend\PageController;
use App\Http\Controllers\ProfileController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


# Admin Route Group

// Route::prefix('admin')->group(function () {
//     Route::get('/dashboard', function () {
//         return view('admin.dashboard');
//     })->middleware(['auth', 'verified'])->name('admin.dashboard');
// });


// admin all routes

// Route::prefix('admin')->group(function () {
//     Route::get('/dashboard', function () {
//         return view('admin.dashboard');
//     })->middleware(['auth', 'verified'])->name('admin.dashboard');
// });


Route::middleware(['auth', 'adminRole:admin'])->prefix('admin')->group(function () {

    // Route::get('/cars', function () {
    //     return view('admin.cars.index');
    // })->name('admin.cars.index');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    route::get('logout', [DashboardController::class,'logout'])->name('admin.logout');
    Route::resource('car', App\Http\Controllers\admin\CarController::class);
    Route::resource('rental', App\Http\Controllers\admin\RentalController::class);
    Route::resource('customer', App\Http\Controllers\admin\CustomerController::class);
});


//customer all route
Route::middleware(['auth', 'customerRole:customer'])->prefix('customer')->group(function () {

    // Route::get('/dashboard', [CustomerController::class, 'index']);
    Route::get('/dashboard', function () {
        return "Customer Dashboard";
    });
});


//frontend routes 

Route::get('/', [PageController::class, 'Home'])->name('frontend.home');
Route::get('/about', [PageController::class, 'About'])->name('frontend.about');
Route::get('/contact', [PageController::class, 'Contact'])->name('frontend.contact');
Route::get('/rentals', [PageController::class, 'Rental'])->name('frontend.rentals');
Route::get('/cars/{id}', [PageController::class, 'Details'])->name('car.details');
