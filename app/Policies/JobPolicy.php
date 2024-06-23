<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobPolicy
{
    /**
     * Determine whether the user can edit the model.
     */
    public function edit(User $user, Job $job): Response
    {
        return $user->id === $job->employer->user->id ? Response::allow() : Response::denyWithStatus(404);
    }
}
