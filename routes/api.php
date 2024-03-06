<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Task\TaskController;
use App\Http\Controllers\Status\StatusController;

Route::resource("statuses", StatusController::class);
Route::resource("tasks", TaskController::class);