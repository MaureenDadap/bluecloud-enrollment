<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Program::create([
            'code' => 'BSCS',
            'name' => 'BS Computer Science',
            'created_at' => date('Y-m-d h:m:s'),
            'updated_at' => date('Y-m-d h:m:s'),
        ]);

        Program::create([
            'code' => 'BSIT',
            'name' => 'BS Information Technology',
            'created_at' => date('Y-m-d h:m:s'),
            'updated_at' => date('Y-m-d h:m:s'),
        ]);

        Program::create([
            'code' => 'BSIS',
            'name' => 'BS Information Systems',
            'created_at' => date('Y-m-d h:m:s'),
            'updated_at' => date('Y-m-d h:m:s'),
        ]);

        Program::create([
            'code' => 'BSA',
            'name' => 'BS Accountancy',
            'created_at' => date('Y-m-d h:m:s'),
            'updated_at' => date('Y-m-d h:m:s'),
        ]);

        DB::table('programs')->insert([
            'code' => 'BSBA',
            'name' => 'BS Business Administration',
            'created_at' => date('Y-m-d h:m:s'),
            'updated_at' => date('Y-m-d h:m:s'),
        ]);

        DB::table('programs')->insert([
            'code' => 'BSTM',
            'name' => 'BS Tourism Management',
            'created_at' => date('Y-m-d h:m:s'),
            'updated_at' => date('Y-m-d h:m:s'),
        ]);

        DB::table('programs')->insert([
            'code' => 'BSESS',
            'name' => 'BS Exercise and Sports Science',
            'created_at' => date('Y-m-d h:m:s'),
            'updated_at' => date('Y-m-d h:m:s'),
        ]);

        DB::table('programs')->insert([
            'code' => 'BSCE',
            'name' => 'BS Civil Engineering',
            'created_at' => date('Y-m-d h:m:s'),
            'updated_at' => date('Y-m-d h:m:s'),
        ]);
    }
}
