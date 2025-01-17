<?php

namespace App\Traits;

use App\Enums\UserRoles;
use App\Models\User;

trait UserRoleTrait
{
    private function roleHierarchy(UserRoles $role): int
    {
        return match ($role) {
            UserRoles::MASTER => 4,
            UserRoles::ADVANCED => 3,
            UserRoles::INTERMEDIATE => 2,
            UserRoles::BASIC => 1,
        };
    }

    private function hasHigherOrEqualRole(User $user, UserRoles $role): bool
    {
        return $this->roleHierarchy($user->role) >= $this->roleHierarchy($role);
    }
}
