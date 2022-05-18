<?php

namespace App\Traits;

trait HasRoleTrait
{
    /**
     * Check if the user has a role.
     *
     * @param mixed $role
     * @return bool
     */
    public function hasRole($role)
    {
        $level = app('config')->get("roles.level.$role");
        if (null !== $level) {
            return $this->level === (int)$level;
        }
        return false;
    }
}
