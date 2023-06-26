<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ResponderRequestTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $responder_request_types = [
            ['responder_request_type_name' => 'Progress'],
            ['responder_request_type_name' => 'Finish'],
            ['responder_request_type_name' => 'Accepted'],
            ['responder_request_type_name' => 'Feedback'],
        ];
        
        DB::table('responder_request_types')->insertOrIgnore($responder_request_types);
    }
}
