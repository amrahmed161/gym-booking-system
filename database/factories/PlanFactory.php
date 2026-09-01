<?php

namespace Database\Factories;

use App\Models\Plan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Plan>
 */
class PlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>$this->faker->randomElement(['Monthly','Quarterly','Yearly']),
            'price'=>$this->faker->randomFloat(2,20,300),
            'duration_in_days'=>$this->faker->randomElement([30,90,365]),
            'description'=>$this->faker->sentence()
        ];
    }
}
