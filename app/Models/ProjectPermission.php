<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProjectPermission extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'tech_name', 'name', 'description'];


    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(ProjectRole::class, 'project_role_permissions',
            'project_permission_id', 'project_role_id')
            ->withTimestamps();
    }
}
