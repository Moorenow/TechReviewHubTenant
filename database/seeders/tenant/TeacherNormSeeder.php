<?php

namespace Database\Seeders\Tenant;

use App\Models\TeacherNorm;
use Illuminate\Database\Seeder;

class TeacherNormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TeacherNorm::factory()->count(20)->create();
    }
}
