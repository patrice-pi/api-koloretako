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

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

Route::group(['middleware' => 'auth:api'], function(){
	Route::post('details', 'API\UserController@details');
});

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
    $leaderboard->mode = $request->mode;

    $leaderboard->save();

    return response()->json($leaderboard);
});



Route::get('/ip_address', function (Request $request) {
    return response()->json(App\Ipaddress::all());
});

Route::put('/ip_address', function (Request $request) {
    $ipaddress = App\Ipaddress::find(1);
    $ipaddress->ip_address = $request->ip_address;
    $ipaddress->machine = $request->machine;

    $ipaddress->save();

    return response()->json($ipaddress);
});

Route::post('/ip_address', function (Request $request) {
    $ipaddress = new App\Ipaddress();
    $ipaddress->ip_address = $request->ip_address;
    $ipaddress->machine = $request->machine;

    $ipaddress->save();

    return response()->json($ipaddress);
});
