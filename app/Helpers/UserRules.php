<?php

namespace App\Helpers;

trait UserRules
{
    /**
     * Check if user is the onwer
     *
     * @return boolean
     *
     * @author Vitor Hugo <vitorhugo.ro10@gmail.com>
     */
    public function createdByMe(): bool
    {
        return $this->user_id === auth()->user()->getKey();
    }

    /**
     * Check if can delete an item
     *
     * @return boolean
     *
     * @author Vitor Hugo <vitorhugo.ro10@gmail.com>
     */
    public function canDelete(): bool
    {
        return auth()->user()->isAssociated() && $this->createdByMe() ||
            auth()->user()->isAdmin();
    }
}
