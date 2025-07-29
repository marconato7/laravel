<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("/user", fn(Request $request) => $request->user())->middleware("auth:sanctum");

Route::get("/hello", fn() => response()->json([ "helloWorld" => "Hello, World!" ], 200));
