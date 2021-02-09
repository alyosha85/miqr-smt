<?php

namespace App\Ldap;

use App\User as DatabaseUser;
use App\Ldap\User as LdapUser;

class AttributeHandler
{
    public function handle(LdapUser $ldap, DatabaseUser $database)
    {
        $database->name = $ldap->getFirstAttribute('cn');
        $database->email = $ldap->getFirstAttribute('mail');
    }
}