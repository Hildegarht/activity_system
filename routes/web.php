<?php

use Illuminate\Support\Facades\Route;
use App\Models\Activity;

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

Route::get('/auth', function () {
    return view('login');
});


Route::get('/', function () {
    $activity = new Activity();
    $activities = $activity->all();

    return view('index', [
        "activities" => $activities
    ]);
})->middleware(['auth'])->name('dashboard');

Route::get('/index', function () {
    $activity = new Activity();
    $activities = $activity->all();

    return view('index', [
        "activities" => $activities
    ]);
})->middleware(['auth'])->name('index');

require __DIR__.'/auth.php';
