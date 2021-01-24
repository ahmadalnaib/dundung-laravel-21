<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Work;
use Illuminate\Auth\Access\HandlesAuthorization;

class WorkPolicy
{
    use HandlesAuthorization;


    public function delete(User  $user,Work $work)
    {

        if ($user->role === 'admin')
        {
            return $user->id !== $work->user_id;
        } else{
            return $user->id ===$work->user_id;
        }

    }


    public  function ownsBy(User $user,Work $work)
    {
         return $user->id === $work->user_id;
    }

}
