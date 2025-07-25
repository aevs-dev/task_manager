<?php

namespace App\Console\Commands\Rbac\Projects;

use App\Console\Services\Rbac\Projects\Permissions\SynchronizeTasksPermissionsService;
use App\Console\Services\Rbac\Projects\Roles\SynchronizeRolesService;
use Illuminate\Console\Command;

class SyncRbacItemsCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project-rbac:sync-items';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Синхронизирует все объекты RBAC-системы из config с тем что в БД';

    public function __construct(
        private readonly SynchronizeTasksPermissionsService $synchronizeTasksPermissionsService,
        private readonly SynchronizeRolesService $synchronizeRolesService,
    )
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->synchronizeTasksPermissionsService->synchronize();
        $this->synchronizeRolesService->synchronize();
    }
}
