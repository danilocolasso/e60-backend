<?php

namespace App\Policies;

use App\Enums\UserRole;
use App\Models\Coupon;
use App\Models\User;
use App\Traits\UserRoleTrait;

class CouponPolicy
{
    use UserRoleTrait;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $this->hasHigherOrEqualRole($user, UserRole::BASIC);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Coupon $coupon): bool
    {
        return $this->hasHigherOrEqualRole($user, UserRole::BASIC);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $this->hasHigherOrEqualRole($user, UserRole::BASIC);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Coupon $coupon): bool
    {
        return $this->hasHigherOrEqualRole($user, UserRole::BASIC);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Coupon $coupon): bool
    {
        return $this->hasHigherOrEqualRole($user, UserRole::BASIC);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Coupon $coupon): bool
    {
        return $this->hasHigherOrEqualRole($user, UserRole::BASIC);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Coupon $coupon): bool
    {
        return $this->hasHigherOrEqualRole($user, UserRole::MASTER);
    }
}
