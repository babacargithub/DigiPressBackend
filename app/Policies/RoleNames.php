<?php

namespace App\Policies;

class RoleNames
{
    const ROLE_EMPLOYEE = "employee";
    const ROLE_ADMIN = "admin";
    const  ROLE_SUPER_ADMIN = "super_admin";
    const ROLE_PARTNER = "partner";

    const ROLES = [self::ROLE_SUPER_ADMIN, self::ROLE_ADMIN, self::ROLE_EMPLOYEE, self::ROLE_PARTNER];

}
