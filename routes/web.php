<?php

use Illuminate\Support\Facades\Route;
use trianstudios\Press\Http\Controllers\TestController;

Route::get('/', [TestController::class, 'index']);