<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContextController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\PackageController;

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

Route::middleware('admin_auth')->group(function(){
    Route::redirect('/', '/user/dashboard');
    Route::get('/register',[AuthController::class,'register'])->name("register");
    Route::get('/login',[AuthController::class,'login'])->name("login");
});


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/dashboard',[AuthController::class,'dashboard']);
    Route::middleware(['admin_auth'])->group(function(){

        Route::get('/count',[AdminController::class,'overallcount'])->name('overallcount');

        Route::get('admin/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
         //package
         Route::resource('package',PackageController::class);
         Route::get('ssd/package',[PackageController::class,'ssd']);


         Route::resource('book',BookController::class);
         Route::get('ssd/book',[BookController::class,'ssd']);

         Route::post('book/{id}/pending', [BookController::class, 'pending'])->name('book.pending');
         Route::post('book/{id}/confirm', [BookController::class, 'confirm'])->name('book.confirm');
         Route::post('book/{id}/cancel', [BookController::class, 'cancel'])->name('book.cancel');

         Route::get('userlist',[UserController::class,'userlist'])->name('user.list');
         Route::get('userbook/{id}',[UserController::class,'book'])->name('user.book');

         Route::get('admin/about',[AboutController::class,'index'])->name('admin.about');
         Route::get('about/{id}',[AboutController::class,'update'])->name('admin.about.update');

         Route::get('admin/contact',[ContactController::class,'index'])->name('admin.contact');
         Route::get('contact/{id}',[ContactController::class,'update'])->name('admin.contact.update');

         Route::get('admin/context',[ContextController::class,'index'])->name('admin.context');
         Route::get('context/{id}',[ContextController::class,'update'])->name('admin.context.update');


        //password
        Route::prefix('adminpassword')->group(function(){
            Route::get('changepage',[AdminController::class,'changepasswordpage'])->name('adminpassword#changepage');
            Route::post('change',[AdminController::class,'changepassword'])->name('adminpassword#change');
        });



    });
    Route::middleware(['user_auth'])->group(function(){
        Route::get('detail/{id}',[PackageController::class,'detail'])->name('package.detail.list');

        Route::get('fav',[UserController::class,'fav'])->name('fav');
        Route::get('/favdelete/{id}',[UserController::class,"favremove"]);
        Route::get('/addfav/{id}',[UserController::class,"addfav"]);

        Route::get('mybook',[BookController::class,'mybook'])->name('mybook');



        Route::prefix('userpassword')->group(function(){
            Route::get('changepage',[UserController::class,'changepasswordpage'])->name('userpassword#changepage');
            Route::post('change',[UserController::class,'changepassword'])->name('userpassword#change');
        });
    });
});


// public
Route::get('user/dashboard',[UserController::class,'index'])->name('user.dashboard');
Route::get('enquiry',[EnquiryController::class,'index'])->name('enquiry');
Route::post('enquiry',[EnquiryController::class,'store'])->name('enquiry.store');
Route::get('about',[UserController::class,'about'])->name('about');
Route::get('contact',[UserController::class,'contact'])->name('contact');
Route::get('packageslists',[PackageController::class,'packages'])->name('packageslists');





