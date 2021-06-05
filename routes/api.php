<?php

use App\Http\Controllers\WordController;
use Illuminate\Support\Facades\Route;



Route::apiResource('/word',WordController::class);
