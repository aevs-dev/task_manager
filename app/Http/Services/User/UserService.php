<?php

namespace App\Http\Services\User;

use App\Http\Repository\User\UserRepository;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\AssignOp\Mod;

class UserService
{
    public function __construct(
        private readonly UserRepository $userRepository
    )
    {
    }

    public function createUser(array $fieldsValues): Model
    {
        return $this->userRepository->create($fieldsValues);
    }

    public function getUserByEmail(string $email): Model|null
    {
        return $this->userRepository->getByEmail($email);
    }

    public function verifyEmail(int $id, string $hash): User
    {
        /**
         * @var User $user
         */

        $user = User::query()->findOrFail($id);

        if (!hash_equals($hash, sha1($user->getEmailForVerification()))) abort(403);

        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }

        return $user;
    }

}
