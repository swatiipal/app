<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/create-spaceroom', [UserController::class, 'storeSpaces'])->name('create-spaceroom');
Route::post('/create-chatroom', [UserController::class, 'storeChats'])->name('create-chatroom');

Route::post('/message-sent', function (\Illuminate\Http\Request $request){
    if(!session()->has('username'))
        session()->put('username', Faker\Factory::create()->userName);
        $chatRoomId = $request->input('chatRoomId'); 
    \App\Events\MessageSent::dispatch(Auth::user()->name, $request->message, $chatRoomId);
    return response()->json(['error'=> false, 'message'=> 'Message sent!', '$chatRoomId'=> $chatRoomId]);
});

require __DIR__.'/auth.php';