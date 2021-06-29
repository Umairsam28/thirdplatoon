<?php

use App\Http\Controllers\Admin\AdsController as AdminAdsController;
use App\Http\Controllers\Admin\AppliedJobsController as AdminAppliedJobsController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\JobsController as AdminJobsController;
use App\Http\Controllers\Admin\JobsCategoryController as AdminJobsCategoryController;
use App\Http\Controllers\Admin\EcommerceController as AdminEcommerceController;
use App\Http\Controllers\Admin\Ecommerce\ProductController as AdminProductController;
use App\Http\Controllers\Admin\Ecommerce\CategoryController as AdminEcommerceCategoryController;
use App\Http\Controllers\Admin\Ecommerce\VendorsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserAdController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\JobsCategoryController;

use App\Http\Controllers\Ecommerce\ProductController as FrontProductController;

use Illuminate\Support\Facades\Route;

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

Route::get('artisan', function () {
    return \Artisan::call('storage:link');
});

// BACKEND

//Ecommerce Handling
Route::get('admin/ecommerce', [AdminEcommerceController::class, 'index'])
->name('admin.ecommerce.index')->middleware('auth');
Route::get('admin/ecommerce/summary', [AdminEcommerceController::class, 'summary'])
->name('admin.ecommerce.summary')->middleware('auth');
Route::resource('admin/products', AdminProductController::class, ['as' => 'admin'])->middleware('auth');
Route::resource('admin/ecommerce/category', AdminEcommerceCategoryController::class, ['as' => 'admin.ecommerce'])->middleware('auth');
Route::get('admin/ecommerce/vendors', [VendorsController::class, 'index'])
->name('admin.ecommerce.vendors')->middleware('auth');
Route::get('admin/ecommerce/vendors-toggle/{user}', [VendorsController::class, 'setAsVendor'])
->name('admin.ecommerce.vendors.setvendor')->middleware('auth');

Route::get('admin/ads/{id}/contact', [AdminAdsController::class, 'contact'], ['as' => 'admin'])->name('admin.ads.contact')->middleware('auth');
Route::resource('admin/ads', AdminAdsController::class, ['as' => 'admin'])->middleware('auth');

Route::post('admin/blog/{id}/status', [AdminBlogController::class, 'status'])->name('admin.blog.status')->middleware('auth');
Route::resource('admin/blog', AdminBlogController::class, ['as' => 'admin'])->middleware('auth');

Route::resource('admin/categories', CategoriesController::class, ['as' => 'admin'])->middleware('auth');

Route::resource('admin/applied_jobs', AdminAppliedJobsController::class, ['as' => 'admin'])->only('index', 'destroy')->middleware('auth');

Route::resource('admin/jobs/categories', AdminJobsCategoryController::class, ['as' => 'admin.jobs'])->middleware('auth');

Route::post('admin/jobs/{job_id}/applied/{user_id}/status/', [AdminJobsController::class, 'applied_status'])->name('admin.jobs.applied.status')->middleware('auth');
Route::get('admin/jobs/{id}/applied', [AdminJobsController::class, 'applied'])->name('admin.jobs.applied')->middleware('auth');
Route::post('admin/jobs/{id}/status', [AdminJobsController::class, 'status'])->name('admin.jobs.status')->middleware('auth');
Route::resource('admin/jobs', AdminJobsController::class, ['as' => 'admin'])->middleware('auth');


// FRONTEND
Route::post('ads/{id}/contact/', [AdsController::class, 'contact'])->name('ads.contact');

Route::resource('ads', AdsController::class);
Route::resource('blog', BlogController::class)->only(['index', 'show']);

Route::get('jobs/{category}/apply/{job_id}', [JobsController::class, 'apply'])->name('jobs.apply')->middleware('auth');
Route::post('jobs/{category}/apply/{job_id}', [JobsController::class, 'save_apply'])->name('jobs.save_apply')->middleware('auth');
Route::get('jobs/{category}/{job_id}', [JobsController::class, 'show'])->name('jobs.show');
Route::get('jobs/{category}', [JobsCategoryController::class, 'index'])->name('jobs.category.show');
Route::get('jobs', [JobsController::class, 'index'])->name('jobs.index');


Route::get("/about-us", [HomeController::class, "about_us"])->name('about_us');
Route::get("/contact-us", [HomeController::class, "contact_us"])->name('contact_us');
Route::post("/contact-us", [HomeController::class, "form_submit"])->name('form_submit');
Route::get("/categories", [HomeController::class, "categories"])->name('categories');
Route::get("/terms", [HomeController::class, "terms"])->name('terms');
Route::get("/privacy", [HomeController::class, "privacy"])->name('privacy');
Route::get("/", [HomeController::class, "index"])->name('home');

/*Ecommerce Frontend*/
Route::get("/shop", [FrontProductController::class, "index"])->name('shop');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');
