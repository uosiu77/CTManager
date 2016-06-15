<?php


/* 
|-------------------------------------------------------------------------- 
| Application Routes 
|-------------------------------------------------------------------------- 
| 
| Here is where you can register all of the routes for an application. 
| It's a breeze. Simply tell Laravel the URIs it should respond to 
| and give it the controller to call when that URI is requested. 
| 
*/ 

Route::get('/', function () {
	return view('index'); 
}); 

Route::group(['prefix' => 'api/v1'], function () {
	//Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
	Route::get('authenticate/usersIndex', 'AuthenticateController@index');
	Route::post('authenticate', 'AuthenticateController@authenticate');
	Route::get('authenticate/user', 'AuthenticateController@getAuthenticatedUser');
}); 

Route::get('/api/v1/seamen_list/{skip}/{limit}/{search?}', 'Seamen@index');
Route::get('/api/v1/seaman_details/{seaman_id}', 'Seamen@details')->where('seaman_id', '[0-9]+');
Route::post('/api/v1/seaman', 'Seamen@store'); 
Route::post('/api/v1/seaman/{id}', 'Seamen@update'); 
Route::delete('/api/v1/seaman/{id}', 'Seamen@destroy');

Route::get('/api/v1/vessels_list/{skip}/{limit}/{search?}', 'Vessels@index');

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/* Route::get('/', function () {
    return view('welcome');
});
 */
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

/* Route::group(['middleware' => ['web']], function () {
    //
});
 */