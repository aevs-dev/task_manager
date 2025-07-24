<?php

namespace App\Http\Services\User;


use App\Models\User;
use Carbon\Carbon;

class PersonalTokenService
{

    public function createNewToken(User $user, string $tokenName, array $abilities, Carbon $expiresAt): string
    {
        return $user->createToken($tokenName, $abilities, $expiresAt)->plainTextToken;
    }
}
