<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rolesAdmin = Roles::where('name', 'admin')->first();
        
        user::create([
            'name' => 'admin',
            'email'=> 'admin1@gmail.com',
            'password'=> Hash::make('090909'),
            'role_id' => $rolesAdmin->id
        ]);
    }
}
