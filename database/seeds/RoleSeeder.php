<?php

use Illuminate\Database\Seeder;
use Silber\Bouncer\Database\Role;

class RoleSeeder extends Seeder
{
    /**
     * The application roles.
     *
     * @var array
     */
    protected $roles = [
        [
          'name' => 'super_admin',
        ],
        [
          'name' => 'administrator',
        ],
        [
          'name' => 'verwaltung',
        ],
        [
          'name' => 'benutzer',
        ],
        [
          'name' => 'praktikant',
        ],
        [
          'name' => 'leer',
        ],
        [
          'name' => 'leer2',
        ],
        [
          'name' => 'leer3',
        ], 
        [
          'name' => 'leer4',
        ],
        [
          'name' => 'leer5',
        ],
 
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->roles as $role) {
            $role = Role::firstOrCreate([
                'name' => $role['name'],
            ]);
        }
    }
}