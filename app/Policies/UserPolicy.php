<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update(User $currentUser, User $user)
    {
        return $currentUser->getAttributeValue('id') === $user->getattribute('id');
    }

    public function destroy(User $currentUser, User $user) {
        return $currentUser->getAttributeValue('is_admin') && $currentUser->getAttributeValue('id') !== $user->getattribute('id');
    }

    public function follow(User $currentUser, User $user)
    {
        return $currentUser->getAttributeValue('id') !== $user->getattribute('id');
    }
}
