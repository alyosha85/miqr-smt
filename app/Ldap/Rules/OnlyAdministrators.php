<?php

namespace App\Ldap\Rules;

use LdapRecord\Laravel\Auth\Rule;

class OnlyAdministrators extends Rule
{
    /**
     * Check if the rule passes validation.
     *
     * @return bool
     */
    public function isValid()
    {
        $administrators = Group::find('ou=EDV,dc=miqr,dc=local');

        return $this->user->groups()->recursive()->exists($administrators);
    }
}
