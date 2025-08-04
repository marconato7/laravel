<?php

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("/user", fn(Request $request) => $request->user())
    ->middleware("auth:sanctum");

Route::post("/users/register", function (Request $request) 
{
    $validator = Validator::make($request->all(), [
        "name"                  => "required|string|max:255",
        "username"              => "required|string|max:20|unique:users",
        "email"                 => "required|string|max:255|unique:users",
        "password"              => "required|string|min:12|confirmed",
    ]);

    if ($validator->fails()) {
        return response()->json([ "errors" => $validator->errors()],422);
    }

    $user = User::create([
        "name"     => $request->name,
        "username" => $request->username,
        "email"    => $request->email,
        "password" => Hash::make($request->password),
    ]);

    $token = $user->createToken("auth_token")->plainTextToken;

    return response()->json([
        "access_token" => $token,
        "token_type" => "Bearer",
    ]);
});

Route::get("/users/profiles", function (Request $request) 
{
    return User::select("id", "username")->get();
});
