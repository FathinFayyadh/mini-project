<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use  App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;

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
Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
Auth::routes();
Route::get('/home', function () {
    return redirect('/');
}); 


Route::get('/explore', [DashboardController::class, 'explore'])->name('explore');
Route::prefix('dashboard')->middleware('authentication')->group(function () {
    Route::prefix('users')->middleware('role:user')->group(function () {
        Route::get('/post', [PostController::class, 'post'])->name('posts');
        Route::get('/post/like/{id}' , [PostController::class, 'like'])->name('like');
        Route::post('/post', [PostController::class, 'postcreate'])->name('post.create');
        Route::get('/comment/{post}', [DashboardController::class, 'comment'])->name('comments');
        Route::post('/comment/{post}', [DashboardController::class, 'commentStore'])->name('comments.post');
        Route::post('/comment/replay/{comment}', [DashboardController::class, 'commentReplayStore'])->name('commentsReplay.post');
        Route::delete('/comments/{comment}', [DashboardController::class, 'destroy'])->name('comment.delete');
        Route::get('/profil', [DashboardController::class, 'profil'])->name('profile');
        Route::get('/notifikasi', [DashboardController::class, 'notifikasi'])->name('notifikasi');
        Route::post('/setting/profil', [PostController::class, 'profilsettings'])->name('profile.create');
        Route::get('/maincontent', [DashboardController::class, 'maincontent'])->name('maincontent');
        Route::get('/post/bookmark/{id}' , [PostController::class, 'bookmark'])->name('bookmark');
        Route::get('/post/bookmark' , [DashboardController::class, 'bookmarkstore'])->name('bookmarks');
        Route::get('/settings/profil', [DashboardController::class, 'SettingProfil'])->name('settings.profil');
        Route::post('/settings/profil', [PostController::class, 'SettingStore'])->name('settings.store');
    });
});



