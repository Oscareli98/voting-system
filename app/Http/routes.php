<?php
use App\User;
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
// Route::get('/accounts', function() {
//     User::create([
//         'email' => 'voting',
//         'password' => bcrypt('hoco')
//     ]);
// });
Route::group(['middleware' => 'auth.basic'], function() {
    Route::get('/', function () {
        return view('home');
    });

    Route::post('/', [
        'as' => 'vote-code',
        'uses' => 'VotingController@postCode'
    ]);

    Route::get('vote/{school}/{code}', [
        'as' => 'vote',
        'uses' => 'VotingController@vote'
    ]);

    Route::get('stats', [
        'as' => 'stats',
        'uses' => 'VotingController@stats'
    ]);

    Route::resource('votes', 'VotingController');
});
