<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::create(['name' => 'owner']);
        Role::create(['name' => 'user']);
    }
}

