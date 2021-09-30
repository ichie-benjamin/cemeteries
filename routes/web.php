<?php


use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Api\ImageUploadController;
use App\Http\Controllers\FlavorsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuCategoriesController;
use App\Http\Controllers\MenusController;
use App\Http\Controllers\PagesControler;
use App\Http\Controllers\RestaurantsController;
use App\Http\Controllers\SidesController;
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

//    Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard');

//PAGES
Route::get('/cemeteries', [PagesControler::class, 'cemeteries'])->name('cemeteries');
Route::get('/memorials', [PagesControler::class, 'memorials'])->name('memorials');
Route::get('/memorial/{memorial', [PagesControler::class, 'showMemorials'])->name('memorial.show');
Route::get('/famous/memorials', [PagesControler::class, 'famousMemorials'])->name('memorials.famous');

Route::get('/about', [PagesControler::class, 'about'])->name('about');
Route::get('/help', [PagesControler::class, 'help'])->name('help');
Route::get('/contact', [PagesControler::class, 'contact'])->name('contact');
Route::get('/terms_of_use', [PagesControler::class, 'terms'])->name('terms');
Route::get('/privacy', [PagesControler::class, 'privacy'])->name('privacy');


Route::group(['middleware' => ['auth']], function () {


    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::resources([
        'restaurants' => HomeController::class,
    ]);

    Route::post('post/image', [ImageUploadController::class, 'postImage'])->name('api.post.image');
});

Route::group(['prefix' => 'filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
