<?php

use App\Http\Controllers\Api\MidtransController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/midtrans-callback', [MidtransController::class, 'callback']);
