<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\RstudentController;
use App\Http\Controllers\RuserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentReqController;
use App\Http\Controllers\UserrController;
use App\Models\Requestt;
use App\Models\Rstudent;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NotSolvedController;
use App\Http\Controllers\SolvedController;
use App\Http\Controllers\StudentLoginController;
use App\Http\Controllers\UserLoginController;
use App\Models\Student;
use App\Models\Student_login;
use App\Models\UserLogin;
use Carbon\Carbon;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Monolog\Handler\RollbarHandler;

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
    return view('welcome');
});

// Route::resource('request',RequestController::class);
Route::resource('ruser',RuserController::class);
Route::group(['prefix'=>'admin', 'as'=>'admin.',  'middleware' =>'AdminLogout'], function() {
    Route::get('/', [LoginController::class,'showLogin'])->name('login')->middleware('checkAdminLogout');

    Route::post('/check',[LoginController::class,'login'])->name('checklogin');

    Route::group(['prefix'=>'/','middleware'=>['checkAdminLogin']], function(){
        
   
        Route::get('/logout',[LoginController::class,'logout'])->name('checklogout');
        Route::resource('student', StudentController::class);
        Route::resource('department',DepartmentController::class);
        Route::resource('userr', UserrController::class);
        Route::resource('request',RequestController::class);
        Route::resource('solved',SolvedController::class);
        Route::resource('notsolved',NotSolvedController::class);
    });
});



Route::group(['prefix'=>'student', 'as'=>'student.', 'middleware' =>'StudentLogout'], function() {
    Route::get('/', [StudentLoginController::class,'showLoginForm'])->name('login')->middleware('checkStudentLogout');

    Route::post('/check',[StudentLoginController::class,'login'])->name('checklogin');

    Route::group(['prefix'=>'/','middleware'=>['checkStudentLogin']], function(){
        Route::get('/profile', function () {
            return view('student.profile');
        });

        Route::get('/logout',[StudentLoginController::class,'logout'])->name('checklogout');
        Route::resource('rstudent',RstudentController::class); 
    });
});

Route::group(['prefix'=>'support', 'as'=>'support.',  'middleware' =>'UserLogout'], function() {
    Route::get('/', [UserLoginController::class,'LoginForm'])->name('login')->middleware('checkUserLogout');

    Route::post('/check',[UserLoginController::class,'login'])->name('checklogin');

    Route::group(['prefix'=>'/','middleware'=>['checkUserLogin']], function(){
        // Route::get('/profile', function () {
           
        //     return view('userr.profile');
            
        // });

        Route::get('/logout',[UserLoginController::class,'logout'])->name('checklogout');
        Route::resource('ruser',RuserController::class); 
    });
});
// Route::get('request','StatusController@solved');
// Route::get('request','StatusController@notsolved');



