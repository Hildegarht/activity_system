<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Activity;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
    ->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    Route::get('/manage', function () {
        $users = new User();

        return view('manage-task', [
            "users" =>  $users->all(),
        ]);
    })->name("manage");

    Route::get('/manage/{id}', function ($id) {
        $users = new User();
        $activities = Activity::find($id);

        return view('manage-task', [
            "users" =>  $users->all(),
            "activity" => $activities
        ]);
    })->where(['id' => '[0-9]+'])->name("update");



    Route::post('/add-task', [TaskController::class, "store"])->name("add_task");
    Route::post('/find-task', [TaskController::class, "find"])->name("find_task");
    Route::post('/update-task/{id}', [TaskController::class, "update"])->where(['id' => '[0-9]+'])->name("update_task");
    Route::get('/delete-task/{id}', [TaskController::class, "destroy"])->where(['id' => '[0-9]+'])->name("delete_task");
    Route::get('/view-task/{id}', [TaskController::class, "show"])->where(['id' => '[0-9]+'])->name("show_task");

});
