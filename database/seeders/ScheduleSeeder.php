<?php

namespace Database\Seeders;

use App\Models\Calendar;
use App\Models\Calendar_user;
use App\Models\calendar_users;
use App\Models\Schedule;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Random;
use Ramsey\Uuid\Uuid;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schedule::query()->delete();
        $users = User::all();
        foreach ($users as $user) {
            foreach ($user->calendars()->get()as $calendar) {
                for ($i = 0; $i <= 6; $i++) {
                    $schedule1 = Schedule::create([
                        'calendar_id' => $calendar->id,
                        'user_id' => $user->id,
                        'day' => $i,
                        'shift_1' => random_int(0, 1),
                        'shift_2' =>  random_int(0, 1),
                        'shift_3' =>  random_int(0, 1),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                    $schedule1->update(['shift' => (($schedule1->shift_1) + ($schedule1->shift_2) + ($schedule1->shift_3))]);
                }
            }
        }
    }
}
