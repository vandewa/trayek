<?php

use App\Livewire\Sk;
use App\Livewire\User;
use App\Livewire\Trayek;
use App\Livewire\Dashboard;
use App\Livewire\Kendaraan;
use App\Livewire\User\Role;
use App\Livewire\UserIndex;
use App\Livewire\Perusahaan;
use App\Livewire\SkKendaraan;
use App\Livewire\SkPengawasan;
use App\Livewire\User\ListRole;
use App\Livewire\User\Permission;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\DashboardController;

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

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('docs', function () {
    return File::get(public_path() . '/documentation.html');
});

Route::get('show-picture', [HelperController::class, 'showPicture'])->name('helper.show-picture');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');
    Route::post('/cetak', [DashboardController::class, 'cetak'])->name('cetak');

    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::get('sk-pengawasan', SkPengawasan::class)->name('sk-pengawasan');
    Route::get('sk-kendaraan', SkKendaraan::class)->name('sk-kendaraan');
    Route::get('sk', Sk::class)->name('sk');

    Route::group(['prefix' => 'master', 'as' => 'master.'], function () {
        Route::get('user-index', UserIndex::class)->name('user-index');
        Route::get('user/{id?}', User::class)->name('user');
        Route::get('list-role', ListRole::class)->name('list-role');
        Route::get('role/{id?}', Role::class)->name('role');
        Route::get('permission', Permission::class)->name('permission');

        Route::get('kendaraan', Kendaraan::class)->name('kendaraan');
        Route::get('perusahaan', Perusahaan::class)->name('perusahaan');
        Route::get('trayek', Trayek::class)->name('trayek');
    });

});
