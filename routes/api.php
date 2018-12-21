<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/leaderboards', function (Request $request) {
    return response()->json(App\Leaderboard::all());
});

Route::post('/leaderboards', function (Request $request) {
    $leaderboard = new App\Leaderboard();
    $leaderboard->pseudo = $request->pseudo;
    $leaderboard->score = $request->score;
    $leaderboard->duration = $request->duration;

    $leaderboard->save();

    return response()->json($leaderboard);
});
