<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\memberController;
use App\Models\Member;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $member = Member::all();
    return view('dashboard',compact('member'));
})->name('dashboard');




Route::get('/member-delete/{id}', [App\Http\Controllers\memberController::class, 'destroy'])->name('member.destroy');
Route::resource('member', memberController::class)->except('destroy');

