<?php

use App\Http\Controllers\ExploreController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowController;
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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::resource('tweets', TweetController::class);

Route::middleware('auth')->group(function () {
    Route::get('tweets_post', function () {
        return view('tweets.form');
    })->middleware('auth')->name('tweetsPost');

    Route::get('users/{user:username}/followings', [FollowController::class, 'followings'])->name('users.followings');
    Route::get('users/{user:username}/followers', [FollowController::class, 'followers'])->name('users.followers');
    Route::get('following_user', [FollowController::class, 'followingUser'])->name('followings.user');

    Route::get('users/{user:username}', [UserController::class, 'show'])
        ->name('users.show');
    Route::post('users/follow', [FollowController::class, 'store'])
        ->name("users.follow");
});

require __DIR__ . '/auth.php';