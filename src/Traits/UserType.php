<?php

namespace DesignByCode\Admin\Traits;

use Illuminate\Database\Eloquent\Builder;

trait UserType
{
    /**
     * get clients
     * @param  [type] $query [description]
     * @return collectioni of user clients
     */
    public function scopeClients($query)
    {
        return $query->where('type', 'client');
    }    

    /**
     * get admin
     * @param  [type] $query [description]
     * @return collectioni of user admin
     */
    public function scopeAdmins($query)
    {
        return $query->where('type', 'admin');
    }    

    /**
     * get resellers
     * @param  [type] $query [description]
     * @return collectioni of user resellers
     */
    public function scopeResellers($query)
    {
        return $query->where('type', 'reseller');
    }

}
