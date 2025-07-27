<?php

namespace App\Enums\Rbac\Project;

enum ProjectDefaultRoleEnum: int
{
    case MEMBER = 1;
    case EMPLOYEE = 101;
    case MODERATOR = 201;
    case OWNER = 301;

}
