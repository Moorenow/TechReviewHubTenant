<?php

namespace Database\Seeders\Tenant;

use App\Models\ClassNorm;
use App\Models\TeacherNorm;
use Illuminate\Database\Seeder;

class ClassNormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = TeacherNorm::all();

        ClassNorm::factory()
            ->count(20)
            ->make()
            ->each(function (ClassNorm $class) use ($teachers): void {
                $class->teacher_id = $teachers->random()->getKey();
                $class->save();
            });
    }
}
