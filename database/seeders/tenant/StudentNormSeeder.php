<?php

namespace Database\Seeders\Tenant;

use App\Models\StudentNorm;
use Illuminate\Database\Seeder;

class StudentNormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StudentNorm::factory()->count(20)->create();
    }
}
