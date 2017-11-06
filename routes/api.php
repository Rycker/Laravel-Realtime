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
})

/*Private Message urls*/

Route::post('get-private-message-notification', 'PrivateMessageController@getUserNotifications');
Route::post('get-private-messages', 'PrivateMessageController@getPrivateMessages');
Route::post('get-private-message', 'PrivateMessageController@getPrivateMessageById');
Route::post('get-private-messages-sent', 'PrivateMessageController@getPrivateMessageSent');
Route::post('send-private-message', 'PrivateMessageController@sendPrivateMessage');

;
