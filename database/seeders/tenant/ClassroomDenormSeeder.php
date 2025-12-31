<?php

namespace Database\Seeders\Tenant;

use App\Models\ClassroomDenorm;
use Illuminate\Database\Seeder;

class ClassroomDenormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = fake();

        ClassroomDenorm::factory()
            ->count(20)
            ->make()
            ->each(function (ClassroomDenorm $classroom) use ($faker): void {
                $faker->unique(true);
                $classroom->teacher = "{$faker->firstName()} {$faker->lastName()}";
                $classroom->students = "{$faker->firstName()} {$faker->lastName()}";
                $classroom->save();
            });
    }
}
