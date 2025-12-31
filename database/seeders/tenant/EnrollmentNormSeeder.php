<?php

namespace Database\Seeders\Tenant;

use App\Models\ClassNorm;
use App\Models\StudentNorm;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Seeder;

class EnrollmentNormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = StudentNorm::all();
        $classes = ClassNorm::all();

        foreach ($students as $student) {
            $count = random_int(2, 5);
            $selected = $classes->random($count);
            $classIds = $selected instanceof EloquentCollection
                ? $selected->modelKeys()
                : [$selected->getKey()];

            $pivotData = [];
            foreach ($classIds as $classId) {
                $pivotData[$classId] = [
                    'enrolled_at' => fake()->dateTimeBetween('-2 months', 'now'),
                ];
            }

            $student->classes()->syncWithoutDetaching($pivotData);
        }
    }
}
