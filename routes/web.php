<?php

use App\Models\User;
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

Route::view('/', 'welcome');

Route::get('dashboard', function(){
    $users=User::Where('id','!=',auth()->user()->id)->get();
    return view('dashboard',[
        'users'=>$users
    ]);
     }) ->middleware(['auth', 'verified']) ->name('dashboard');

     Route::get('chat/{id}', function($id){
        return view('chat',[
            'id'=>$id
        ]);
         }) ->middleware(['auth', 'verified']) ->name('chat');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
