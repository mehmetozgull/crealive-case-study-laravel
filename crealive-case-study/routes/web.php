<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\Home;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Back\BlogController;

# BACK
Auth::routes([
    'register' => false,
    'reset' => false,
]);
Route::prefix('ccs-admin')->name("back.")->middleware("auth")->group(function (){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/blogs/deletes', [BlogController::class, 'trashBlogs'])->name('trash.blog');
    Route::resource('blogs', 'App\Http\Controllers\Back\BlogController');
    Route::get('/deleteblog/{id}', [BlogController::class, 'delete'])->name('delete.blog');
    Route::get('/harddeleteblog/{id}', [BlogController::class, 'hardDelete'])->name('hard.delete.blog');
    Route::get('/recoverblog/{id}', [BlogController::class, 'recover'])->name('recover.blog');
});


# FRONT
Route::get('/', [Home::class, 'index'])->name("front.home");
Route::get("/{category}", [Home::class, "category"])->name("category");
Route::get("/{category}/{name_seo}", [Home::class, "blogDetail"])->name("blog-detail");
Route::get('/login', [Home::class, 'login'])->name("login");


