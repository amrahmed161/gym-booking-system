<?php

namespace Database\Factories;

use App\Models\Trainer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Trainer>
 */
class TrainerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> $this->faker->name(),
            'specialization'=> $this->faker->randomElement([
                'Yoga', 'Boxing', 'Weightlifting', 'CrossFit', 'Pilates', 'Zumba'
            ]),
            'bio'=> $this->faker->paragraph(),
            'years_of_experience'=> $this->faker->numberBetween(1,20),
            'phone'=>$this->faker->phoneNumber()
        ];
    }
}
