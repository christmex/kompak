<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FormCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $form_categories = [
            ['form_category_name' => 'UMUM'],
            ['report_type_name' => 'SAINS'],
            ['report_type_name' => 'POLITIK'],
            ['report_type_name' => 'LAINNYA'],
        ];
        
        DB::table('form_categories')->insertOrIgnore($form_categories);
    }
}
