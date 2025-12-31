<?php

namespace Database\Seeders\Tenant;

use Illuminate\Database\Seeder;

class NormDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            TeacherNormSeeder::class,
            StudentNormSeeder::class,
            ClassNormSeeder::class,
            EnrollmentNormSeeder::class,
        ]);
    }
}
