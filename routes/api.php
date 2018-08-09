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

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');

Route::group(['middleware' => 'auth:api'], function() {

    Route::get('stations', 'StationController@index');
    Route::get('stations/{id}', 'StationController@show');
    Route::post('stations', 'StationController@store');
    Route::put('stations/{id}', 'StationController@update');
    Route::delete('stations/{id}', 'StationController@delete');

    Route::post('stations_distance', 'StationController@showDistance');

    Route::get('companies', 'CompanyController@index');
    Route::get('companies/{id}', 'CompanyController@show');
    Route::post('companies', 'CompanyController@store');
    Route::put('companies/{id}', 'CompanyController@update');
    Route::delete('companies/{id}', 'CompanyController@delete');


    Route::get('companies_tree/{id}', 'CompanyController@showTree');

});


/*

Route::get('stations', function() {
    // If the Content-Type and Accept headers are set to 'application/json',
    // this will return a JSON structure. This will be cleaned up later.
    return Station::all();
});

Route::get('stations/{id}', function($id) {
    return Station::find($id);
});

Route::post('stations', function(Request $request) {
    return Station::create($request->all);
});

Route::put('stations/{id}', function(Request $request, $id) {
    $article = Station::findOrFail($id);
    $article->update($request->all());

    return $article;
});

Route::delete('stations/{id}', function($id) {
    Station::find($id)->delete();

    return 204;
});
*/

/*
Route::middleware('auth:api')
    ->get('/user', function (Request $request) {
        return $request->user();
    });*/


