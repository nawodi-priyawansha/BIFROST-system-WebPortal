<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;


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
    return view('auth.login');
});

// Route::get('/admin-dashboard', function () {
//     return view('admin.user.dashboard');
// });
Route::get('/user-dashboard', function () {
    return view('user.user.profile');
});


//admin dashboard route
Route::get('/admin/dashboard', [DashboardController::class, 'viewdashboard'])->name('admindashboard'); 
Route::get('/admin/financial', [DashboardController::class, 'viewfinancial'])->name('admin.financial');


// login 
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::get('/admin-dashboard', function () {
    return view('admin.user.dashboard');
})->name('admin.dashboard')->middleware('checkUserType:admin');

// Route::get('/user-dashboard', function () {
//     return view('user.user.dashboard');
// })->name('user.dashboard')->middleware('checkUserType:user');

// Route::middleware(['auth'])->group(function () {
//     Route::get('/user-dashboard', function () {
//         // TO DO change return view user.user.dashboard
//         return view('user.user.profile');
//     })->name('user.dashboard');
// });


// Route to handle unauthorized access
Route::get('/unauthorized', function () {
    return "You are not authorized to access this page.";
});
