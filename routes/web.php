<?php

use App\Http\Controllers\UserController;
use App\Http\Livewire\LoginPage;
use App\Http\Livewire\NewsFeedPage;
use App\Http\Livewire\ProfilePage;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Notification;
use App\Notifications\InvoicePaid;
use Illuminate\Support\Facades\DB;

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

Route::get('/', NewsFeedPage::class)->name('newsfeed');
Route::get('/profile/{username}', ProfilePage::class)->name('profile');
Route::get('/login', LoginPage::class)->name('login');

Route::middleware(['admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::view('/setting', 'setting')->name('admin.setting');
    });
});


Route::get('send', function(){
    Notification::route('mail', 'infas@leadmediaproduction.com')->notify(new InvoicePaid());
});

Route::get('/test', function(){
    DB::table('users')->orderBy('id')->chunk(10, function ($users) {
        foreach ($users as $user) {
            echo $user->username;
        }
    });
});
