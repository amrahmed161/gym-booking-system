<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\ClassSchedule;
use App\Models\GymClass;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\Trainer;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Plans (مستقلة)
        $plans = Plan::factory()->count(3)->create();

        // 2. Trainers (مستقلين)
        $trainers = Trainer::factory()->count(5)->create();

        // 3. GymClasses - كل واحد مرتبط بمدرب موجود فعلاً
        $gymClasses = GymClass::factory()
            ->count(10)
            ->recycle($trainers) // يستخدم trainer موجود بدل ما يعمل واحد جديد كل مرة
            ->create();

        // 4. ClassSchedules - لكل GymClass موجود
        $schedules = ClassSchedule::factory()
            ->count(20)
            ->recycle($gymClasses)
            ->create();

        // 5. Users (أعضاء)
        $users = User::factory()->count(15)->create();

        // 6. Subscriptions - لكل User اشتراك (مرتبط بـ plan موجود)
        foreach ($users as $user) {
            Subscription::factory()->create([
                'user_id' => $user->id,
            ]);
        }


        Booking::factory()
            ->count(25)
            ->recycle($users)
            ->recycle($schedules)
            ->create();
    }
}
