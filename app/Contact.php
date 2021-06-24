<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use LdapRecord\Laravel\LdapImportable;
use LdapRecord\Laravel\ImportableFromLdap;

class Contact extends Authenticatable implements LdapImportable
{
    use ImportableFromLdap;

    // ...
}
