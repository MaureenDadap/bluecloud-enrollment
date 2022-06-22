<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //admin seeder
        DB::table('users')->insert([
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'account_type' => 'admin',
            'created_at' => date('Y-m-d h:m:s'),
            'updated_at' => date('Y-m-d h:m:s'),
        ]);

        //academic year seeder
        DB::table('academic_schedules')->insert([
            'year_start' => '2022',
            'year_end' => '2023',
            'term' => '1',
            'created_at' => date('Y-m-d h:m:s'),
            'updated_at' => date('Y-m-d h:m:s'),
        ]);

        $this->call([
            ProgramsSeeder::class,
            StudentSeeder::class,
            AssessmentSeeder::class,
        ]);
    }
}
