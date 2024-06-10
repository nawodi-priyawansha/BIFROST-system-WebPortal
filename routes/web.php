<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\MobileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



use App\Http\Controllers\MailController;
use App\Http\Controllers\UserDashboardController;


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
    return redirect('login');
});
// Display the login form
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
// login 
Route::post('login', [AuthController::class, 'login'])->name('login');
// logout
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
// Display the forget password form
Route::get('forget/password', function () {
    return view('auth.forget-password');
})->name('forget.password');


// reset pin nummber
Route::post('send-forgot-password-email', [MailController::class, 'sendForgotPasswordEmail']);
Route::get('/resetpassword/{token}', [MailController::class, 'resetpassword_index'])->name('resetpassword');
Route::post('frogot-password/new-pin', [MailController::class, 'insert_new_pin'])->name('frogot-password');

// admin login
Route::middleware(['admin'])->group(function () {
    Route::get('/admin-dashboard', function () {
        return view('admin.user.dashboard');
    })->name('admin.dashboard');
});

// user login
Route::middleware(['auth'])->group(function () {
    Route::get('/user-dashboard', function () {
        // return view user.user.dashboard
        return view('user.user.dashboard');
    })->name('user.dashboard');
});

// Route to handle unauthorized access
Route::get('/unauthorized', function () {
    return "You are not authorized to access this page.";
});


//admin dashboard route
Route::middleware(['admin'])->group(function () {
    // dashboard
    Route::get('/admin/dashboard', [DashboardController::class, 'viewdashboard'])->name('admindashboard');
    // access
    Route::get('/admin/access', [DashboardController::class, 'viewaccess'])->name('admindaaccess');
    // financial
    Route::get('/admin/financial', [DashboardController::class, 'viewfinancial'])->name('adminfinancial');
});

//user dashboard route
Route::middleware(['user'])->group(function () {
    // dashboard
    Route::get('/user/dashboard', [UserDashboardController::class, 'viewdashboard'])->name('userdashboard');
    // profile
    Route::get('/user/profile', [UserDashboardController::class, 'viewprofile'])->name('userprofile');
    // Add new Profile
    Route::get('/user/new-profile', [UserDashboardController::class, 'viewnewprofile'])->name('usernewprofile');
});
//mobile route
Route::get('/mobile/login',[MobileController::class,'login'])->name('mobile.login');
Route::get('/mobile/forgetpin',[MobileController::class, 'forgetpin'])->name('mobile.pin');
Route::get('/mobile/trainingday',[MobileController::class, 'trainingday'])->name('mobile.trainingday');
Route::get('/mobile/readinessscore',[MobileController::class, 'readinessscore'])->name('mobile.readinessscore');

Route::post('send-forgot-password-email', [MailController::class, 'sendForgotPasswordEmail']);
Route::get('/resetpassword/{token}', [MailController::class, 'resetpassword_index'])->name('resetpassword');
Route::post('frogot-password/new-pin', [MailController::class, 'insert_new_pin'])->name('frogot-password');

