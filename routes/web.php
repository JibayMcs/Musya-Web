<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\YoutubeController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::post('/play', [HomeController::class, 'play_single_music'])->name('song.play');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/download/{url}', [YoutubeController::class, 'download'])->name('download');
    Route::resource('artists', ArtistController::class);

    Route::get('/redirect', function () {

        $query = http_build_query([
            'client_id' => '1',
            'redirect_uri' => 'http://localhost',
            'response_type' => 'token',
            'scope' => '',
            'state' => Str::random(40),
        ]);

        return redirect('/oauth/authorize?'.$query);
    });
});

require __DIR__.'/auth.php';
