<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\Pivot;


class UserProject extends Pivot
{
    use HasFactory;

    public function role(): HasOne
    {
        return $this->hasOne(ProjectRole::class, 'id', 'project_role_id');
    }
}
