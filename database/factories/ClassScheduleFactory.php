<?php

namespace Database\Factories;

use App\Models\ClassSchedule;
use App\Models\GymClass;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ClassSchedule>
 */
class ClassScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startTime = $this->faker->numberBetween(6,20);

        return [
            'gym_class_id' => GymClass::factory(),
            'day_of_week' => $this->faker->randomElement([
               'Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'
            ]),
            'start_time' => sprintf('%02d:00:00', $startTime),
            'end_time'=> sprintf('%02d:00:00', $startTime + 1)
        ];
    }
}
