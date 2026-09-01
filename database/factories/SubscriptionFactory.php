<?php

namespace Database\Factories;

use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Subscription>
 */
class SubscriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

            $plan = Plan::factory()->create();
            $startDate = $this->faker->dateTimeBetween('-1 month', 'now');

            return[
                'user_id' => User::factory(),
                'plan_id' => $plan->id,
                'start_date' => $startDate,
                'end_date' => (clone $startDate)->modify("+{$plan->duration_in_days} days"),
                'status' => 'active',
            ];
    }
}
