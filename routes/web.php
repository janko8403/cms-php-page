<?php

use Illuminate\Support\Facades\Route;
use App\Classes\MainPage;

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

Session::put('locale', 'pl');

Route::get('locale', function () {
    return \App::getLocale();
});

Route::get('locale/{locale}', function ($locale) {
	\Session::put('locale', $locale);
    return redirect()->back();
});

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

Route::get('/', function () {
    $pg = new MainPage;
    return redirect($pg->getMainPage());
});

// Admin cms page
Route::group(['prefix'=>'admin', 'middleware' => 'roles', 'roles' => ['Admin']], function() {
    Route::get('/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('dashboard');

    // Users 
    Route::get('/users', [App\Http\Controllers\Admin\AdminController::class, 'users'])->name('users');
    Route::get('/add-user', [App\Http\Controllers\Admin\AdminController::class, 'add_user'])->name('add-user');
    Route::post('/create-user', [App\Http\Controllers\Admin\AdminController::class, 'create_user'])->name('create-user');
    Route::delete('/delete-user/{id}', [App\Http\Controllers\Admin\AdminController::class, 'delete_user'])->name('delete-user');
    Route::get('/activate-user/{id}', [App\Http\Controllers\Admin\AdminController::class, 'activate_user'])->name('activate-user');
    Route::get('/reactive-token/{token}', [App\Http\Controllers\Admin\AdminController::class, 'reactive_token'])->name('reactive-token');

    // Lang 
    Route::get('/language', [App\Http\Controllers\Admin\AdminController::class, 'language'])->name('language');
    Route::get('/add-language', [App\Http\Controllers\Admin\AdminController::class, 'add_language'])->name('add-language');
    Route::post('/create-language', [App\Http\Controllers\Admin\AdminController::class, 'create_language'])->name('create-language');
    Route::get('/edit-language/{id}/edit', [App\Http\Controllers\Admin\AdminController::class, 'edit_language'])->name('edit-language');
    Route::post('/update-language/{id}', [App\Http\Controllers\Admin\AdminController::class, 'update_language'])->name('update-language');
    Route::delete('/delete-language/{id}', [App\Http\Controllers\Admin\AdminController::class, 'delete_language'])->name('delete-language');
    
    // Pages 
    Route::get('/pages', [App\Http\Controllers\Admin\AdminController::class, 'pages'])->name('pages');
    Route::get('/add-page', [App\Http\Controllers\Admin\AdminController::class, 'add_page'])->name('add-page');
    Route::post('/create-page', [App\Http\Controllers\Admin\AdminController::class, 'create_page'])->name('create-page');
    Route::get('/edit-page/{id}/edit', [App\Http\Controllers\Admin\AdminController::class, 'edit_page'])->name('edit-page');
    Route::post('/update-page/{id}', [App\Http\Controllers\Admin\AdminController::class, 'update_page'])->name('update-page');
    Route::delete('/delete-page/{id}', [App\Http\Controllers\Admin\AdminController::class, 'delete_page'])->name('delete-page');
    Route::get('/clone-page/{id}', [App\Http\Controllers\Admin\AdminController::class, 'clone_page'])->name('clone-page');
    
    // Footers 
    Route::get('/footers', [App\Http\Controllers\Admin\AdminController::class, 'footers'])->name('footers');
    Route::get('/add-footer', [App\Http\Controllers\Admin\AdminController::class, 'add_footer'])->name('add-footer');
    Route::post('/create-footer', [App\Http\Controllers\Admin\AdminController::class, 'create_footer'])->name('create-footer');
    Route::get('/edit-footer/{id}/edit', [App\Http\Controllers\Admin\AdminController::class, 'edit_footer'])->name('edit-footer');
    Route::post('/update-footer/{id}', [App\Http\Controllers\Admin\AdminController::class, 'update_footer'])->name('update-footer');
    Route::delete('/delete-footer/{id}', [App\Http\Controllers\Admin\AdminController::class, 'delete_footer'])->name('delete-footer');
    Route::get('/clone-footer/{id}', [App\Http\Controllers\Admin\AdminController::class, 'clone_footer'])->name('clone-footer');
    
    // Media 
    Route::get('/media', [App\Http\Controllers\Admin\AdminController::class, 'media'])->name('media');
    Route::post('/create-media', [App\Http\Controllers\Admin\AdminController::class, 'create_media'])->name('create-media');
    Route::delete('/delete-media/{id}', [App\Http\Controllers\Admin\AdminController::class, 'delete_media'])->name('delete-media');
});

// Set language 
Route::post('/set-lng', [App\Http\Controllers\User\UserController::class, 'set_lng'])->name('set-lng');
Route::get('/test', [App\Http\Controllers\User\UserController::class, 'test'])->name('test');
Route::get('/site-under-construction', [App\Http\Controllers\User\UserController::class, 'under_construction'])->name('site-under-construction');

// Pages 
Route::get('/pages/{id}', [App\Http\Controllers\User\UserController::class, 'pages'])->name('pages');
Route::get('/page/{slug}', [App\Http\Controllers\User\UserController::class, 'page'])->name('page');

// Set password
Route::get('/activate/{token}', [App\Http\Controllers\User\UserController::class, 'activate'])->name('activate');
Route::post('/update-password', [App\Http\Controllers\User\UserController::class, 'update_password'])->name('update-password');


Route::post('/create-api', [App\Http\Controllers\User\UserController::class, 'create_api'])->name('create-api');