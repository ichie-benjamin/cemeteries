<?php


use App\Http\Controllers\Api\ImageUploadController;
use App\Http\Controllers\CementeriesController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemorialsController;
use App\Http\Controllers\PagesControler;
use App\Http\Controllers\UserController;
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


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/import/1', [CommonController::class, 'import1'])->name('import1');
Route::get('/import/2', [CommonController::class, 'import2'])->name('import2');
Route::get('/import/3', [CommonController::class, 'import3'])->name('import3');
Route::get('/import/id/{id}', [CommonController::class, 'importId'])->name('import.id');



Route::get('/home', [HomeController::class, 'index'])->name('index');

//    Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard');

//PAGES
//Route::get('/cemetery', [PagesControler::class, 'cemeteries'])->name('cemeteries');
Route::get('/cemetery', [PagesControler::class, 'cemeteriesList'])->name('cemeteries');
Route::get('/cemeteries/list', [PagesControler::class, 'cemeteriesList'])->name('cemeteries.list');

Route::get('/memorials/listing', [PagesControler::class, 'memorials'])->name('memorials');
Route::get('/memorial/{memorial', [PagesControler::class, 'showMemorials'])->name('memorial.show');
Route::get('/famous/memorials', [PagesControler::class, 'famousMemorials'])->name('memorials.famous');

Route::get('/about', [PagesControler::class, 'about'])->name('about');
Route::get('/help', [PagesControler::class, 'help'])->name('help');
Route::get('/contact', [PagesControler::class, 'contact'])->name('contact');
Route::get('/terms_of_use', [PagesControler::class, 'terms'])->name('terms');
Route::get('/privacy', [PagesControler::class, 'privacy'])->name('privacy');

Route::get('/cemeteries/create', [CementeriesController::class, 'create'])->name('cemeteries.create');


Route::group(['middleware' => ['auth']], function () {

    Route::get('/seed/roles', [HomeController::class, 'seedRole'])->name('seed.role');

    Route::get('/user/profile/edit', [UserController::class, 'editProfile'])->name('user.profile.edit');
    Route::get('/user/profile/{id}', [UserController::class, 'profile'])->name('user.profile');
    Route::get('/user/account', [UserController::class, 'account'])->name('user.account');
    Route::post('/user/profile/update', [UserController::class, 'updateProfile'])->name('user.profile.update');
    Route::post('/user/profile/update/password', [UserController::class, 'updatePassword'])->name('user.profile.update.password');
    Route::post('/user/profile/update/notifications', [UserController::class, 'updateNotifications'])->name('user.profile.update.notifications');
    Route::post('/user/profile/update/theme', [UserController::class, 'updateTheme'])->name('user.profile.update.theme');
    Route::post('/user/profile/update/email', [UserController::class, 'updateEmail'])->name('user.profile.update.email');
    Route::get('/user/request/{type}', [UserController::class, 'makeRequest'])->name('user.request');

    Route::get('/user/{id}/memorials', [UserController::class, 'memorials'])->name('user.memorials');


    Route::get('/user/toggle/follow/{id}', [UserController::class, 'toggleFollow'])->name('user.toggle.follow');

    Route::get('/user/find/member', [UserController::class, 'findMember'])->name('user.find.members');


    Route::get('/user/set/role', [HomeController::class, 'setRole'])->name('user.set_role');

    Route::get('/user/set/role/{role}', [HomeController::class, 'setUserRole'])->name('user.set.role');

    Route::get('/user/add/cemetery', [HomeController::class, 'addCemetery'])->name('user.addcemetery');

    Route::get('/memorial/search/cemetery', [MemorialsController::class, 'searchCemetery'])->name('memorial.search_cemetery');

    //search cemeteries
    Route::post('/cemetery/search', [CementeriesController::class, 'search'])->name('cemeteries.search');

    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::resources([
//        'restaurants' => HomeController::class,
        'cemeteries' => CementeriesController::class,
        'memorials' => MemorialsController::class,
    ]);

    Route::get('/memorial/photos/{id}', [MemorialsController::class, 'photos'])->name('memorials.photos');
    Route::post('/memorial/photos/store', [MemorialsController::class, 'storePhoto'])->name('memorials.photo.store');

    Route::get('/my/photos', [HomeController::class, 'photos'])->name('photos');


    Route::post('post/image', [ImageUploadController::class, 'postImage'])->name('api.post.image');

    Route::post('import/cemeteries', [CommonController::class, 'importCemeteries'])->name('import.cemeteries');
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

//Route::group(['prefix' => 'cemeteries'], function () {
//    Route::get('/show/{cementery}','CementeriesController@show')->name('cementeries.cementery.show')->where('id', '[0-9]+');
//    Route::get('/{cementery}/edit','CementeriesController@edit')->name('cementeries.cementery.edit')->where('id', '[0-9]+');
//    Route::put('cementery/{cementery}', 'CementeriesController@update')->name('cementeries.cementery.update')->where('id', '[0-9]+');
//    Route::delete('/cementery/{cementery}','CementeriesController@destroy')->name('cementeries.cementery.destroy')->where('id', '[0-9]+');
//});


@include('admin.php');


Route::get('/{id}/{username}', [PagesControler::class, 'viewCemetery'])->name('cemetery.show');
//
//Route::group([
//    'prefix' => 'memorial',
//], function () {
//    Route::get('/', 'MemorialsController@index')
//         ->name('memorials.memorial.index');
//    Route::get('/create','MemorialsController@create')
//         ->name('memorials.memorial.create');
//    Route::get('/show/{memorial}','MemorialsController@show')
//         ->name('memorials.memorial.show')->where('id', '[0-9]+');
//    Route::get('/{memorial}/edit','MemorialsController@edit')
//         ->name('memorials.memorial.edit')->where('id', '[0-9]+');
//    Route::post('/', 'MemorialsController@store')
//         ->name('memorials.memorial.store');
//    Route::put('memorial/{memorial}', 'MemorialsController@update')
//         ->name('memorials.memorial.update')->where('id', '[0-9]+');
//    Route::delete('/memorial/{memorial}','MemorialsController@destroy')
//         ->name('memorials.memorial.destroy')->where('id', '[0-9]+');
//});
