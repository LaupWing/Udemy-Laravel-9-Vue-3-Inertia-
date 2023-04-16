<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\User;
use Illuminate\Notifications\DatabaseNotification;

class NotficationSeenPolicy
{
   public function update(User $user, DatabaseNotification $databaseNotification): bool
   {
      return $user->id === $databaseNotification->notifiable_id;
   }
}
