<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\JsonResponse;

class ProjectController extends Controller
{
    public function getProjects(): JsonResponse
    {
        $project = Project::query()->first();
        $result = auth()->user()->can('view', $project);
        return response()->json(['message' => 'Все ок!', 'result' => $result]);
    }
}
