<?php

namespace Database\Factories;

use App\Models\ClassroomDenorm;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClassroomDenorm>
 */
class ClassroomDenormFactory extends Factory
{
    protected $model = ClassroomDenorm::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startsAt = fake()->optional(0.7)->dateTimeBetween('-1 month', '+1 month');
        $endsAt = $startsAt ? fake()->optional(0.8)->dateTimeBetween($startsAt, '+3 months') : null;

        return [
            'class_code' => fake()->unique()->bothify('CD-###??'),
            'class_name' => fake()->words(3, true),
            'starts_at' => $startsAt,
            'ends_at' => $endsAt,
        ];
    }
}
