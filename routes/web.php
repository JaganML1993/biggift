<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MicroController;
use App\Models\microsite\MicroCompany;

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
//     return view('welcome');
// });

/** admin routes */
Route::prefix('admin')->group(function () {
    Route::get('/', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
    Route::get('registration', [AuthController::class, 'registration'])->name('register');
    Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
    Route::get('dashboard', [AuthController::class, 'dashboard']); 
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

/** user application routes */
Route::prefix('/')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('biggift.index');
    Route::get('contact/', [HomeController::class, 'contactus'])->name('biggift.contactus');
});


/** micro sites */
Route::get('micro/', [MicroController::class, 'index'])->name('microsite.index');
Route::post('micro/authenticate', [MicroController::class, 'authenticate'])->name('micro.authenticate'); 

$domain_exists = MicroCompany::select('*')->where('approval', 1)->where('status', 1)->get();
foreach ($domain_exists as $domain){
    $company =  strtolower(str_replace(' ', '-', $domain->company));
    $company = preg_replace('/[^A-Za-z0-9\-]/', '', $company);
    $id = $domain->company;
    Route::group([
        'prefix' => $company, 
        'name' => $company . '.products',
    ], function() {
        Route::get('gifts/{id}/', [MicroController::class, 'products']);
    });

}


