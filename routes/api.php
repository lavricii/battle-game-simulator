<?php

use App\Http\Controllers\BattleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/battles/run', [BattleController::class, 'store']);
Route::get('/battles', [BattleController::class, 'index']);
