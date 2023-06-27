<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReportTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $report_types = [
            ['report_type_name' => 'REPORT USER'],
            ['report_type_name' => 'REPORT BUG'],
            ['report_type_name' => 'REQUEST NEW FEATURE'],
            ['report_type_name' => 'FEEDBACK'],
            ['report_type_name' => 'ANOTHER'],
        ];
        
        DB::table('report_types')->insertOrIgnore($report_types);
    }
}
