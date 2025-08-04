<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

// https://laravel.com/docs/12.x/eloquent-resources

class UserProfileResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            "id"       => $this->id,
            "username" => $this->username,
        ];
    }
}
