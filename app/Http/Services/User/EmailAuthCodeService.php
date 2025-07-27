<?php

namespace App\Http\Services\User;

use App\Models\EmailAuthCode;

class EmailAuthCodeService
{
    public function setNewCode(int $userId): string
    {
        EmailAuthCode::query()->where('user_id', '=', $userId)->delete();

        $newCode =  str_pad(rand(1, 999999), 6, '0', STR_PAD_LEFT);
        return (EmailAuthCode::query()->create([
            'user_id' => $userId,
            'code' => $newCode
        ]))->code;
    }

    public function checkCode(int $userId, string $code): bool
    {
        $isSuccess = EmailAuthCode::query()
            ->where('user_id', '=', $userId)
            ->where('code', '=', $code)
            ->exists();

        if (!$isSuccess) return false;

        EmailAuthCode::query()->where('user_id', '=', $userId)->delete();
        return true;

    }
}
