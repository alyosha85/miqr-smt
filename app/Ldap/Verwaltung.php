<?php

namespace App\Ldap;

use App\Ldap\Scopes\ImportFilter;
use LdapRecord\Models\Model;
use LdapRecord\Models\ActiveDirectory\User as BaseModel;

class Verwaltung extends BaseModel
{

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ImportFilter);
    }
}
