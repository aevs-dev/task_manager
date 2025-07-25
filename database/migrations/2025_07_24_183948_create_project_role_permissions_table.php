<?php

use App\Models\ProjectPermission;
use App\Models\ProjectRole;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('project_role_permissions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ProjectRole::class);
            $table->foreignIdFor(ProjectPermission::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_role_permissions');
    }
};
