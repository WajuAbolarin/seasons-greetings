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

Route::get('/da', function () {

   $client = new GuzzleHttp\Client();


   $url ='https://www.bulksmsnigeria.com/api/v1/sms/create?api_token='.config('sms.token'). '&from=SGREETINGS&to=07056576921,08147966847,08146277962&body=Wishing you a merry Christmas from seasonsgreet.i.ng';
//    $reponse = $client->post($url);
//    dd(json_encode($reponse->getBody()), $reponse->getStatusCode());
});
Route::view('/', 'welcome');

Route::resource('messages', 'MessageController');
