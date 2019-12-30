<?php

namespace DesignByCode\Admin\Observers;

use DesignByCode\Admin\Models\UserSocial;

class UserSocialObservers
{
    
    public function created(UserSocial $userSocial)
    {
        $this->handleRegisterdEvent('created', $userSocial);
    }

    protected function handleRegisterdEvent($event, UserSocial $userSocial)
    {
        $class = config("social.events.{$userSocial->service}.{$event}", null);
        
        if($class === null) {
            return ;
        }

        event(new $class($userSocial->user()->first()));
    }


}
