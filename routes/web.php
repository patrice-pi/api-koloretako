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

Route::get('/', function () {
    $leaderboards = App\Leaderboard::orderBy('score', 'DESC')->orderBy('duration','ASC')->get();

    return view('welcome', ['leaderboards' => $leaderboards]);
});

Route::get('/the-team', function () {
    return view('the-team');
});

Route::get('/game', function () {
    return view('game');
});
