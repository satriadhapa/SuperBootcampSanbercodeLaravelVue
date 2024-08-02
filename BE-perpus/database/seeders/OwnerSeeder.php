<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ownerRole = Role::where('name', 'owner')->first();

        Role::create([
            'name' => 'owner',
            'email' => 'owner@gmail.com',
            'password' => Hash::make('090909'),
            'role_id' => $ownerRole->id
        ]);
    }
}
