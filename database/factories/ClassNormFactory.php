<?php

namespace Database\Factories;

use App\Models\ClassNorm;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClassNorm>
 */
class ClassNormFactory extends Factory
{
    protected $model = ClassNorm::class;

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
            'code' => fake()->unique()->bothify('CN-###??'),
            'name' => fake()->words(3, true),
            'starts_at' => $startsAt,
            'ends_at' => $endsAt,
        ];
    }
}
