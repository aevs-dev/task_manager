<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProjectRole extends Model
{

    use HasFactory;

    protected $fillable = ['id', 'title', 'type', 'description'];

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(ProjectPermission::class, 'project_role_permissions',
            'project_role_id', 'project_permission_id')
            ->withTimestamps();
    }
}
