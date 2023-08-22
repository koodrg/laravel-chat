<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('chat');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/chat', function() {
        return view('chat');
    });
    
    Route::get('/getUserLogin', function() {
        return Auth::user();
    });
    
    Route::get('/messages', function() {
        return App\Models\Message::with('user')->get();
    });
    
    Route::post('/messages', function() {
       $user = Auth::user();
    
      $message = new App\Models\Message();
      $message->message = request()->get('message', '');
      $message->user_id = $user->id;
      $message->save();
    
      return ['message' => $message->load('user')];
    });
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
