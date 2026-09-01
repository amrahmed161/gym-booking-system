<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\ClassSchedule;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=> User::factory(),
            'class_schedule_id' => ClassSchedule::factory(),
            'status' => 'booked',
            'checked_in_at' => null
        ];
    }
}
