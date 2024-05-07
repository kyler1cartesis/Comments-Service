<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Comments')->insertOrIgnore([
            'user_id' => "71b4806d-90c4-45c2-a21c-c0250b45bf5f",
            'step_id' => "495be160-df91-4ebd-b6ab-dbe7187a2612",
            'text' => 'Example comment',
            'parent_id' => 21
        ]);
    }
}
