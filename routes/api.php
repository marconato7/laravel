<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

Route::get("/user", fn(Request $request) => $request->user())->middleware("auth:sanctum");

Route::get("/hello", function()
{
    $remetente = Remetente::create("test@test.com");

    return response()->json([ "remetente" => $remetente->getEmail() ], 200);
});

class Remetente
{
    private $email;

    private function __construct(string $email)
    {
        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public static function create(string $email)
    {
        $data =
        [
            "email" => $email,
        ];

        $rules =
        [
            "email" => [ "required", "email:rfc,dns,strict,spoof", "max:255" ],
        ];

        $validator = Validator::make($data, $rules);
        if ($validator->fails())
        {
            throw new \Exception($validator->errors()->first());
        }

        return new self($email);
    }
}
