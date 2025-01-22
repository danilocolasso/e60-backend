<?php

namespace App\Traits;

use App\Enums\UserRole;
use App\Models\User;

trait UserRoleTrait
{
    private function roleHierarchy(UserRole $role): int
    {
        return match ($role) {
            UserRole::MASTER => 4,
            UserRole::ADVANCED => 3,
            UserRole::INTERMEDIATE => 2,
            UserRole::BASIC => 1,
        };
    }

    private function hasHigherOrEqualRole(User $user, UserRole $role): bool
    {
        return $this->roleHierarchy($user->role) >= $this->roleHierarchy($role);
    }
}
