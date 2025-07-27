<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectRolePermission extends Model
{
    use HasFactory;

    public function role(): BelongsTo
    {
        return $this->belongsTo(ProjectRole::class, 'project_role_id', 'id');
    }

    public function permission(): BelongsTo
    {
        return $this->belongsTo(ProjectPermission::class, 'project_role_id', 'id');
    }
}
