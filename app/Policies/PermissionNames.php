<?php

namespace App\Policies;

class PermissionNames
{
    const ACCESS_ADMIN_AREA = "access_admin_area";
    const ACCESS_SUPER_ADMIN_AREA = "access_super_admin_area";
    const  CREATE_USER = "create_user";
    const  PERMISSIONS = [self::ACCESS_SUPER_ADMIN_AREA, self::ACCESS_ADMIN_AREA, self::CREATE_USER];

}
