<?php

use App\Http\Controllers\AdminListingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ChildcategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\FrontAdsController;
use App\Http\Controllers\SendMessageController;
use App\Http\Controllers\SocialLoginController;
use App\Http\Controllers\SaveAdController;
use App\Http\Controllers\FraudController;


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



Route::get('/home', function () {
    return view('home');
});



Route::get('/dashboard', [DashboardController::class, 'index']);


//admin

Route::group(['prefix' => 'auth', 'middleware'=>'admin'], function () {

    Route::get('/', function(){
        return view('backend.admin.index');
    });
    
    
    Route::resource('/category', CategoryController::class);
    Route::resource('/subcategory', SubcategoryController::class);
    Route::resource('/childcategory', ChildcategoryController::class);

    //admin listing

    Route::get('/allads', [AdminListingController::class, 'index'])->name('all.ads');

    // listing reported add

    Route::get('/reported-ads', [FraudController::class, 'index'])->name('all.reported.ads');

});
Route::get('/', [FrontAdsController::class, 'index']);


//ads
Route::get('/ads/create', [AdvertisementController::class, 'create'])->name('ads.create')->middleware('auth');
Route::post('/ads/store', [AdvertisementController::class, 'store'])->middleware('auth')->name('ads.store');
Route::get('/ads', [AdvertisementController::class, 'index'])->middleware('auth')->name('ads.index');
Route::get('/ads/{id}/edit', [AdvertisementController::class, 'edit'])->name('ads.edit')->middleware('auth');
Route::put('/ads/{id}/update', [AdvertisementController::class, 'update'])->name('ads.update')->middleware('auth');
Route::delete('/ads/{id}/delete', [AdvertisementController::class, 'destroy'])->name('ads.destroy')->middleware('auth');

Route::get('/ad-pending', [AdvertisementController::class, 'pendingAds'])->name('pending.ad');



//profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile')->middleware('auth');
Route::post('/profile', [ProfileController::class, 'updateProfile'])->name('update.profile')->middleware('auth');

//user ads

Route::get('/ads/{userId}/view', [FrontendController::class, 'viewUserAds'])->name('show.user.ads');

//front
Route::get(
    '/product/{categorySlug}',
    [FrontendController::class, 'findBasedOnCategory']
)
->name('category.show')->middleware('auth');


Route::get(
    '/product/{categorySlug}/{subcategorySlug}', 
[FrontendController::class, 'findBasedOnSubcategory'])
->name('subcategory.show')->middleware('auth');


Route::get(
    '/product/{categorySlug}/{subcategorySlug}/{childCategorySlug}',
    [FrontendController::class, 'findBasedOnChildcategory']
)
    ->name('childcategory.show')->middleware('auth');

    
Route::get(
    '/products/{id}/{slug}',
    [FrontendController::class, 'show']
)
->name('product.view')->middleware('auth');

//Message


Route::post('/send/message', [SendMessageController::class, 'store'])->middleware('auth');
Route::get('messages', [SendMessageController::class, 'index'])->name('messages')->middleware('auth');
Route::get('/users', [SendMessageController::class, 'chatWithThisUser'])->middleware('auth');
Route::get('/message/user/{id}',[SendMessageController::class, 'showMessages'])->middleware('auth');
Route::post('/start-conversation', [SendMessageController::class, 'StartConversation'])->middleware('auth');

// Login 

Route::get('auth/facebook', [SocialLoginController::class, 'facebookRedirect']);
Route::get('auth/facebook/callback', [SocialLoginController::class, 'loginWithFacebook']);


//Save annonce 

Route::post('/ad/save', [SaveAdController::class, 'saveAd']);
Route::post('/ad/remove', [SaveAdController::class, 'removeAd'])->name('ad.remove');
Route::get('/saved-ads', [SaveAdController::class, 'getMyads'])->name('saved.ad');


// report  annonce
Route::post('/report-this-ad', [FraudController::class, 'store'])->name('report.ad');
