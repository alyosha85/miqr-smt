<?php

namespace App\Ldap\Scopes;

use LdapRecord\Models\Model;
use LdapRecord\Models\Scope;
use LdapRecord\Query\Model\Builder;
use LdapRecord\Models\ActiveDirectory\Group;

class ImportFilter implements Scope
{
    /**
     * Apply the scope to the given query.
     *
     * @param Builder $query
     * @param Model   $model
     *
     * @return void
     */
    public function apply(Builder $query, Model $model)
    {
        $group = Group::findByAnrOrFail('verwaltung');
        $query->whereMemberOf($group);
        
    }
}
