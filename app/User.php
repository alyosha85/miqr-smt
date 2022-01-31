<?php

namespace App;

use Carbon\Carbon;
use Laravelista\Comments\Commenter;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use LdapRecord\Laravel\Auth\LdapAuthenticatable;
use LdapRecord\Laravel\Auth\AuthenticatesWithLdap;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements LdapAuthenticatable
{
    use Notifiable, AuthenticatesWithLdap, Commenter;
    use HasRoles;

    protected $guard_name = 'web';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'roles_name',
        'status',
        'lastlogin',
        'position',
        'abteilung',
        'tel',
        'fax',
        'ort',
        'straße',
        'plz',
        'vorname',
        'name',
        'mobil',
        'privat',
        'email_privat',
        'abschluss',
        'businessUnit',
        'office',
        'title',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getAll()
    {
      $users = User::get()->toArray();
      $user = Auth()->user();
      $now = Carbon::now()->locale('de_DE')->translatedFormat('d F Y H:i');
      $admins = User::role('Super_Admin')->get();
      return [$user,$users,$now,$admins];
    }
}
