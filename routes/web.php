<?php

use App\Http\Controllers\AccessController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientManagementController;
use App\Http\Controllers\CommunicationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FinancialController;
use App\Http\Controllers\MobileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



use App\Http\Controllers\MailController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\WorkoutLibraryController;

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
        return redirect('/admin/dashboard');
    })->name('admin.dashboard');
});

// user login
Route::middleware(['auth'])->group(function () {
    Route::get('/user-dashboard', function () {
        // return view user.user.dashboard
        return redirect('/user/dashboard');
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



    // access page Routes
    Route::get('/admin/access', [AccessController::class, 'viewaccess'])->name('admindaaccess');
    // Change user name and email
    Route::post('/updatedata', [AccessController::class, 'setData']);
    // delete user
    Route::post('/deletedata', [AccessController::class, 'deleteData']);
    // reset pin
    Route::post('/resetpin', [AccessController::class, 'resetPin']);
    // chane access type
    Route::post('/updateaccesstype', [AccessController::class, 'updateAccess']);
    // chane access page
    Route::post('/updateaccesspage', [AccessController::class, 'updateAccessPage']);
    //  next button
    Route::get('/users/{user}', [AccessController::class, 'nextShow'])->name('user.show');
    // previous button
    Route::get('/previous-show/{id}', [AccessController::class, 'previousShow'])->name('previous.show');



    // financial
    Route::get('/admin/financial', [FinancialController::class, 'viewfinancial'])->name('adminfinancial');
    // client management
    Route::get('/admin/clientmanagement', [ClientManagementController::class, 'viewclientmanagement'])->name('viewadminclientmanagement');
    //workout librabry
    Route::get('/admin/workoutlibrary', [WorkoutLibraryController::class, 'viewworkoutlibrary'])->name('viewworkoutlibrary');
    Route::post('/save-workout-library', [WorkoutLibraryController::class, 'listworkoutlibrary'])->name('save.workoutlibrary');
    Route::delete('/workout-library/{id}',[WorkoutLibraryController::class, 'delete'])->name('workout-library.delete');
    // session
    Route::get('/admin/session', [SessionController::class, 'viewsession'])->name('viewsession');
    // communication
    Route::get('/admin/communication', [CommunicationController::class, 'viewcommunication'])->name('viewviewcommunication');
    //statistic
    Route::get('/admin/statistics', [StatisticsController::class, 'viewstatistics'])->name('viewviewstatistics');


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
Route::get('/mobile/login', [MobileController::class, 'login'])->name('mobile.login');
Route::get('/mobile/forgetpin', [MobileController::class, 'forgetpin'])->name('mobile.pin');
Route::get('/mobile/trainingday', [MobileController::class, 'trainingday'])->name('mobile.trainingday');
Route::get('/mobile/readinessscore', [MobileController::class, 'readinessscore'])->name('mobile.readinessscore');
Route::get('/mobile/workout', [MobileController::class, 'workout'])->name('mobile.workout');
Route::get('/mobile/workouttimer', [MobileController::class, 'workouttimer'])->name('mobile.workouttimer');
Route::get('/mobile/histroyview', [MobileController::class, 'histroyview'])->name('mobile.histroyview');

// Display the forget password form
Route::get('forgot/password', function () {
    return view('mobile.auth.forgetpin');
})->name('mobileforget.password');

Route::post('send-forgot-password-email', [MailController::class, 'sendForgotPasswordEmail']);
Route::get('/resetpassword/{token}', [MailController::class, 'resetpassword_index'])->name('resetpassword');
Route::post('frogot-password/new-pin', [MailController::class, 'insert_new_pin'])->name('frogot-password');

