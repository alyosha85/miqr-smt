<?php

namespace App\Ldap;

use App\Ldap\Scopes\ImportFilter;
use LdapRecord\Models\Model;

class User extends BaseModel
{
  protected static function boot()
  {
      parent::boot();
      static::addGlobalScope(new ImportFilter);
  }
}
