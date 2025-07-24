<?php

namespace App\Http\Repository\User;

use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\AssignOp\Mod;

class UserRepository
{

    protected function getQuery(): Builder
    {
        return User::query();
    }

    protected function getByOneField(string $fieldName, string $value): Model|null
    {
        return $this->getQuery()->firstWhere($fieldName, '=', $value);
    }

    public function create($fieldsValues): Model
    {
        return $this->getQuery()->create($fieldsValues);
    }

    public function getByEmail(string $email): Model|null
    {
        return $this->getByOneField('email', $email);
    }
}
