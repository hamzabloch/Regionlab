<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\userController;
use App\Http\Controllers\clientController;
use App\Http\Controllers\clientuserController;
use App\Models\User;
use App\Models\client;
use App\Models\clientuser;
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
    return view('login');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::get('/user', [App\Http\Controllers\userController::class, 'index'])->name('user');
Route::get('/client', [App\Http\Controllers\clientController::class, 'index'])->name('client');



Route::get('/usercreate', [userController::class, 'create'])->name('user.create');
Route::post('/userstore', [userController::class, 'store'])->name('user.store');
Route::get('/useredit/{id}/', [userController::class, 'edit'])->name('user.edit');
Route::post('/userupdate/{id}', [userController::class, 'update'])->name('user.update');
Route::get('/userdelete/{id}', [userController::class, 'destroy'])->name('user.delete');
Route::post('/clientassign/{id}', [userController::class, 'assign'])->name('clientassign');
Route::post('/userassign/{id}', [clientController::class, 'assignuser'])->name('userassign');


Route::get('/clientcreate', [clientController::class, 'create'])->name('client.create');
Route::post('/clientstore', [clientController::class, 'store'])->name('client.store');
Route::get('/clientedit/{id}/', [clientController::class, 'edit'])->name('client.edit');
Route::post('/clientupdate/{id}', [clientController::class, 'update'])->name('client.update');
Route::get('/clientdelete/{id}', [clientController::class, 'destroy'])->name('client.delete');
Route::post('/statusedit/{id}', [clientController::class, 'updatestatus'])->name('status.edit');
Route::get('/Commentsview/{id}', [clientController::class, 'viewcomment'])->name('comment.view');
Route::get('/ExtraDetail/{id}', [clientController::class, 'viewextra'])->name('extra.view');

Route::post('/file', [clientController::class, 'csv_to_array'])->name('fileset');

Route::post('/filetype/{id}', [clientController::class, 'file'])->name('filetype');
Route::get('/closedetail', [clientController::class, 'close'])->name('close');
Route::get('/Message', [clientController::class, 'message'])->name('message');
Route::get('/messageid/{id}/', [clientController::class, 'usermessage'])->name('message.id');
Route::post('/mesagesave/{id}', [clientController::class, 'messagesave'])->name('message.save');






Route::get('/meetingcreate', [clientuserController::class, 'index'])->name('meeting.create');
Route::post('/meetingstore', [clientuserController::class, 'store'])->name('meeting.store');
Route::get('/meetingedit/{id}/', [clientuserController::class, 'edit'])->name('meeting.edit');
Route::post('/meetingupdate/{id}', [clientuserController::class, 'update'])->name('meeting.update');
Route::get('/meetingdelete/{id}', [clientuserController::class, 'destroy'])->name('meeting.delete');






Route::get('/logout', [userController::class, 'logout'])->name('logout');