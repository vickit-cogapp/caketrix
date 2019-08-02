<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * @package App
 */
class Role extends Model
{
    const CAKE_TSAR = 'cake_tsar';
    const VOTER = 'voter';

    /**
     * Get the role of the current user
     * @param $userId
     * @return mixed
     */
    public function getUserRole($userId)
    {
        $role = self::where('user_id', $userId)->first();
        return $role->role;
    }
}
