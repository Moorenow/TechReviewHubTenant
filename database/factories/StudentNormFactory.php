<?php

namespace Database\Factories;

use App\Models\StudentNorm;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentNorm>
 */
class StudentNormFactory extends Factory
{
    protected $model = StudentNorm::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'enrollment_number' => fake()->unique()->numerify('ENR-#####'),
        ];
    }
}
