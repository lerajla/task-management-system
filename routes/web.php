<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskExportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

// Home route
Route::middleware('guest')->group(function () {
  Route::get('/', function () {
      return view('auth.login');
  });
});


Route::middleware('auth')->group(function () {
  Route::resource('tasks', TaskController::class);
  Route::patch('tasks/{task}/complete', [TaskController::class, 'markAsDone'])->name('tasks.complete');
  Route::resource('users', UserController::class);
  Route::resource('roles', RoleController::class);
  Route::get('/', [UserController::class, 'dashboard'])->name('dashboard');
});
require __DIR__.'/auth.php';
