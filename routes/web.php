<?php
use \App\Events\ChatMessagePosted;
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
    return view('welcome');
});

Route::get('/testPrivateMessage', function() {
    return App\PrivateMessage::where('id', 1)->first();
});

Route::get('/chat', function(){
    return view('chat');
})->middleware('auth');

Route::get('/chatMessages', function(){
    return \App\ChatMessage::with('user')->get();
})->middleware('auth');

Route::post('/chatMessages', function(){
    // Store the new message
    $user = Auth::user();

    $message = $user->messages()->create([
        'message' => request()->get('message')
    ]);

    //Annouce that a new chat message has been posted
    broadcast(new ChatMessagePosted($message, $user))->toOthers();

    return ['status' => $user];
})->middleware('auth');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


