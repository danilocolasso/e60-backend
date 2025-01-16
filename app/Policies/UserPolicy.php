<?php

namespace App\Policies;

use App\Enums\UserRoles;
use App\Models\User;

class UserPolicy
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

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $this->hasHigherOrEqualRole($user, UserRoles::MASTER);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        return $user->id === $model->id || $this->hasHigherOrEqualRole($user, UserRoles::MASTER);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $this->hasHigherOrEqualRole($user, UserRoles::MASTER);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        return $user->id === $model->id || $this->hasHigherOrEqualRole($user, UserRoles::MASTER);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        return $this->hasHigherOrEqualRole($user, UserRoles::MASTER);
    }
}
