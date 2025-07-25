<?php

namespace App\Http\Controllers\Api\V1;

use App\Events\UserLoggedInEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\CheckAuthEmailCodeRequest;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Http\Resources\User\UserResource;
use App\Http\Services\User\EmailAuthCodeService;
use App\Http\Services\User\PersonalTokenService;
use App\Http\Services\User\UserService;
use App\Models\ProjectRole;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class UserController extends Controller
{
    public function __construct(
        private readonly UserService $userService,
        private readonly PersonalTokenService $personalTokenService,
        private readonly EmailAuthCodeService $emailAuthCodeService,
    )
    {
    }


    public function register(RegisterRequest $request): JsonResource
    {

        /**
         * @var User $user
         */

        $validatedData = $request->validated();
        $user = $this->userService->createUser($validatedData);

        event(new Registered($user));
        return new UserResource($user);
    }


    public function login(LoginRequest $request): JsonResource|JsonResponse
    {
        /**
         * @var User $user
         */

        $credentials = $request->only(['email', 'password']);
        if (!auth()->attempt($credentials)) return response()->json(['error' => 'Unauthorized'], 401);

        $user = auth()->user();

        $emailAuthCode = $this->emailAuthCodeService->setNewCode($user->id);
        event(new UserLoggedInEvent($user, $emailAuthCode));

        return (new UserResource(auth()->user()));
    }

    public function logout(): JsonResponse
    {
        /**
         * @var User $user
         */

        $user = auth()->user();
        $user->currentAccessToken()->delete();

        return response()->json(status: 204);
    }


    public function me(): JsonResource
    {
        return (new UserResource(auth()->user()));
    }

    public function verifyEmail($id, $hash): JsonResource
    {
        /**
         * @var User $user
         */

        $user = $this->userService->verifyEmail($id, $hash);
        $newToken = $this->personalTokenService->createNewToken($user, "token_{$user->id}", ['*'], now()->addMonth());

        return (new UserResource($user))->additional(['token' => $newToken]);
    }

    public function checkAuthEmailCode(CheckAuthEmailCodeRequest $request): JsonResource
    {
        /**
         * @var User $user
         */

        $validated = $request->validated();
        $user = $this->userService->getUserByEmail($validated['email']);
        if (!$user) abort(404, 'User not found');

        $codeIsValid = $this->emailAuthCodeService->checkCode($user->id, $validated['code']);
        if (!$codeIsValid) abort(401, 'No authenticated');

        $newToken = $this->personalTokenService->createNewToken($user, "token_{$user->id}", ['*'], now()->addMonth());
        return (new UserResource($user))->additional(['token' => $newToken]);
    }
}
