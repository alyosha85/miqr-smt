<?php

namespace App\Ldap;

use App\Ldap\Scopes\ImportFilter;
<<<<<<< HEAD
use LdapRecord\Models\Model;
=======
use LdapRecord\Models\ActiveDirectory\User as BaseModel;
>>>>>>> 78d19087394ffb5d2d13ae4ee41eb126ae5fd839

class User extends BaseModel
{
<<<<<<< HEAD
  protected static function boot()
  {
      parent::boot();
      static::addGlobalScope(new ImportFilter);
  }
}#
=======
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ImportFilter);
    }
}
>>>>>>> 78d19087394ffb5d2d13ae4ee41eb126ae5fd839
