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
        DB::table('programs')->insert([
            'code' => 'BSCS',
            'name' => 'BS Computer Science',
            'created_at' => date('Y:mm:dd'),
            'updated_at' => date('Y:mm:dd'),
        ]);
    }
}
