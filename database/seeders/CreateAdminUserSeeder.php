<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'admin',
            'username' => 'admin',
            'password' => 'admin',
            'account_type' => 'admin',
            'created_at' => date('Y:m:d'),
            'updated_at' => date('Y:m:d'),
        ]);
    }
}
