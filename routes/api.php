<?php


use App\Http\Controllers\HelloController;
use App\Http\Middleware\ResponseManipulation;
use App\Http\Middleware\ValidationToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/hello', [HelloController::class, 'hello'])->middleware(ValidationToken::class);

Route::post('/nama', [HelloController::class, 'nama'])->middleware(ValidationToken::class, ResponseManipulation::class);