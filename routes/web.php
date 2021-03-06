<?php



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
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');


Route::get('user', 'UserController@getUser')->name('user')->middleware('auth');
Route::post('update', 'UserController@updateUser')->name('update');

Route::get('/leaderboard', function () {
    $leaderboard1 = App\Leaderboard::where('mode','1')->orderBy('score', 'DESC')->orderBy('duration','ASC')->get();

    $leaderboard2 = App\Leaderboard::where('mode','2')->orderBy('score', 'DESC')->orderBy('duration','ASC')->get();

    $leaderboard3 = App\Leaderboard::where('mode','3')->orderBy('score', 'DESC')->orderBy('duration','ASC')->get();

    $leaderboard4 = App\Leaderboard::where('mode','4')->orderBy('score', 'DESC')->orderBy('duration','ASC')->get();

    return view('welcome', ['leaderboard_easy' => $leaderboard1, 'leaderboard_medium' => $leaderboard2, 'leaderboard_hard' => $leaderboard3, 'leaderboard_legend' => $leaderboard4]);
})->middleware('auth');

Route::get('/', function () {
    return view('home');
});

Route::get('/the-team', function () {
    return view('the-team');
});

Route::get('/game', function () {
    return view('game');
});
