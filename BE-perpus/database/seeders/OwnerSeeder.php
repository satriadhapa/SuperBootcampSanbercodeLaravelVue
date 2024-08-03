<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class OwnerSeeder extends Seeder
{
    public function run()
    {
        $ownerRole = Role::where('name', 'owner')->first();

        if ($ownerRole) {
            User::create([
                'name' => 'Owner',
                'email' => 'owner@gmail.com',
                'password' => Hash::make('090909'),
                'role_id' => $ownerRole->id
            ]);
        } else {
            echo "Owner role not found.\n";
        }
    }
}
