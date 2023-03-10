<?php

use Illuminate\Support\Facades\Route;

/** admin */
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\SettingsController;
use App\Http\Controllers\admin\ProductsController;
use App\Http\Controllers\admin\HomeDeliveryController;

/** user */
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

    /** corporate gift products */
    Route::get('products-ecom-index', [ProductsController::class, 'index'])->name('products.ecom.index');
    Route::get('products-ecom-create', [ProductsController::class, 'create'])->name('products.ecom.create');
    Route::post('products-ecom-store', [ProductsController::class, 'store'])->name('products.ecom.store'); 
    Route::get('products-ecom-edit/{id}', [ProductsController::class, 'edit'])->name('products.ecom.edit'); 
    Route::post('products-ecom-update', [ProductsController::class, 'update'])->name('products.ecom.update'); 
    Route::get('products-ecom-delete/{id}', [ProductsController::class, 'delete'])->name('products.ecom.delete'); 
    Route::get('products-ecom-delete_image/{id}', [ProductsController::class, 'delete_image'])->name('products.ecom.delete_image'); 

    /** home delivery products */
    Route::get('products-home_delivery-index', [HomeDeliveryController::class, 'index'])->name('products.home_delivery.index');
    Route::get('products-home_delivery-create', [HomeDeliveryController::class, 'create'])->name('products.home_delivery.create');
    Route::post('products-home_delivery-store', [HomeDeliveryController::class, 'store'])->name('products.home_delivery.store'); 
    Route::get('products-home_delivery-edit/{id}', [HomeDeliveryController::class, 'edit'])->name('products.home_delivery.edit'); 
    Route::post('products-home_delivery-update', [HomeDeliveryController::class, 'update'])->name('products.home_delivery.update'); 
    Route::get('products-home_delivery-delete/{id}', [HomeDeliveryController::class, 'delete'])->name('products.home_delivery.delete'); 
    Route::get('products-home_delivery-delete_image/{id}', [HomeDeliveryController::class, 'delete_image'])->name('products.home_delivery.delete_image'); 

    /** home delivery enquiry */
    Route::get('homeDelivery-enquiry-index', [HomeDeliveryController::class, 'index_enquiry'])->name('homeDelivery.enquiry.index_enquiry');
    Route::get('homeDelivery-enquiry-view/{id}', [HomeDeliveryController::class, 'view_enquiry'])->name('homeDelivery.enquiry.view_enquiry');
    Route::post('homeDelivery-enquiry-update', [HomeDeliveryController::class, 'update_enquiry'])->name('homeDelivery.enquiry.update_enquiry');

    Route::get('category-settings', [SettingsController::class, 'index'])->name('settings.category');
    Route::get('create-category', [SettingsController::class, 'create'])->name('create.category');
    Route::post('save-category', [SettingsController::class, 'store'])->name('save.category'); 
    Route::get('edit-category/{id}', [SettingsController::class, 'edit'])->name('edit.category');
    Route::post('update-category', [SettingsController::class, 'update'])->name('update.category'); 
    Route::get('delete-category/{id}', [SettingsController::class, 'destroy'])->name('delete.category');

    Route::get('subcategory-settings', [SettingsController::class, 'index_subcategory'])->name('settings.subcategory');
    Route::get('create-subcategory', [SettingsController::class, 'create_subcategory'])->name('create.subcategory');
    Route::post('save-subcategory', [SettingsController::class, 'store_subcategory'])->name('save.subcategory'); 
    Route::get('edit-subcategory/{id}', [SettingsController::class, 'edit_subcategory'])->name('edit.subcategory');
    Route::post('update-subcategory', [SettingsController::class, 'update_subcategory'])->name('update.subcategory'); 
    Route::get('delete-subcategory/{id}', [SettingsController::class, 'destroy_subcategory'])->name('delete.subcategory');

    Route::get('brand-settings', [SettingsController::class, 'index_brand'])->name('settings.brand');
    Route::get('create-brand', [SettingsController::class, 'create_brand'])->name('create.brand');
    Route::post('save-brand', [SettingsController::class, 'store_brand'])->name('save.brand'); 
    Route::get('edit-brand/{id}', [SettingsController::class, 'edit_brand'])->name('edit.brand');
    Route::post('update-brand', [SettingsController::class, 'update_brand'])->name('update.brand'); 
    Route::get('delete-brand/{id}', [SettingsController::class, 'destroy_brand'])->name('delete.brand');

});

/** user application routes */
Route::prefix('/')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('biggift.index');
    Route::get('contact/', [HomeController::class, 'contactus'])->name('biggift.contactus');
    Route::get('corporate-biggift/', [HomeController::class, 'corporate_index'])->name('corporate.biggift');
    Route::get('corporate-catalog/', [HomeController::class, 'corporate_catalog'])->name('corporate.catalog');
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


