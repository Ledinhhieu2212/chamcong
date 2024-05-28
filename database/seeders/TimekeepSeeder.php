<?php

namespace Database\Seeders;

use App\Models\Calendar;
use App\Models\calendar_users;
use App\Models\detail_timekeep;
use App\Models\Schedule;
use App\Models\timekeep;
use App\Models\User;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TimekeepSeeder extends Seeder
{




    public function run(): void
    {
        detail_timekeep::query()->delete();
        timekeep::query()->delete();
        $users = User::all();
        foreach ($users as $user) {
            foreach ($user->calendars()->get() as $calendar) {
                $start_date = Carbon::parse( $calendar->start_date);
                for ($i = 0; $i <= 6; $i++) {
                    $schedule1 = Schedule::where("calendar_id", $calendar->id)->where("user_id", $user->id)->where('day', $i)->first();
                    $timekeep1 = timekeep::create([
                        "calendar_id" => $calendar->id,
                        'user_id' => $user->id,
                        'date' => Carbon::parse($calendar->start_date)->copy()->addDays($i),
                        'time_in' => Carbon::parse("07:00:00")->addMinutes(rand(-60, 60)),
                        'time_out' => Carbon::parse("22:00:00")->addMinutes(rand(-60, 60)),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                    if ($schedule1->shift_1 == 1) {
                        if ($schedule1->shift_2 == 1) {
                            if ($schedule1->shift_3 == 1) {
                                // Nếu Chấm công đến muộn
                                if (Carbon::parse($timekeep1->time_in) > Carbon::parse("07:15:00")) {
                                    detail_timekeep::create([
                                        "timekeep_id" => $timekeep1->id,
                                        'calendar_id' => $calendar->id,
                                        'month' => $start_date->month,
                                        'shift' =>  $schedule1->shift,
                                        'user_id' => $user->id,
                                        'status' => 2
                                    ]);
                                }
                                // Nếu chấm công về sớm
                                if (Carbon::parse($timekeep1->time_out) < Carbon::parse("21:45:00")) {
                                    detail_timekeep::create([
                                        "timekeep_id" => $timekeep1->id,
                                        'calendar_id' => $calendar->id,
                                        'month' => $start_date->month,
                                        'user_id' => $user->id,
                                        'shift' =>  $schedule1->shift,
                                        'status' => 3
                                    ]);
                                }
                                // Nếu chấm công đúng giờ
                                if (Carbon::parse($timekeep1->time_in) <= Carbon::parse("07:15:00") && Carbon::parse($timekeep1->time_out) >= Carbon::parse("21:45:00")) {
                                    detail_timekeep::create([
                                        "timekeep_id" => $timekeep1->id,
                                        'calendar_id' => $calendar->id,
                                        'user_id' => $user->id,
                                        'month' => $start_date->month,
                                        'shift' =>  $schedule1->shift,
                                        'status' => 1
                                    ]);
                                }
                            } else {
                                if (
                                    Carbon::parse($timekeep1->time_in) <= Carbon::parse("07:15:00") &&
                                    Carbon::parse($timekeep1->time_out) >= Carbon::parse("16:45:00")
                                ) {
                                    detail_timekeep::create([
                                        "timekeep_id" => $timekeep1->id,
                                        'calendar_id' => $calendar->id,
                                        'user_id' => $user->id,
                                        'month' => $start_date->month,
                                        'year' => Carbon::now()->year,
                                        'shift' =>  $schedule1->shift,
                                        'status' => 1
                                    ]);
                                }

                                if (Carbon::parse($timekeep1->time_in) > (Carbon::parse("07:15:00"))) {
                                    detail_timekeep::create([
                                        "timekeep_id" => $timekeep1->id,
                                        'calendar_id' => $calendar->id,
                                        'user_id' => $user->id,
                                        'month' => $start_date->month,
                                        'year' => Carbon::now()->year,
                                        'shift' =>  $schedule1->shift,
                                        'status' => '2',
                                    ]);
                                }
                                if (Carbon::parse($timekeep1->time_out) < (Carbon::parse("16:45:00"))) {
                                    detail_timekeep::create([
                                        "timekeep_id" => $timekeep1->id,
                                        'calendar_id' => $calendar->id,
                                        'user_id' => $user->id,
                                        'month' => $start_date->month,
                                        'year' => Carbon::now()->year,
                                        'shift' =>  $schedule1->shift,
                                        'status' => '3',
                                    ]);
                                }
                            }
                        } else {
                            if ($schedule1->shift_3 == 1) {
                                if (
                                    Carbon::parse($timekeep1->time_in) <= Carbon::parse("07:15:00") &&
                                    Carbon::parse($timekeep1->time_out) >= (Carbon::parse("21:45:00"))
                                ) {
                                    detail_timekeep::create([
                                        "timekeep_id" => $timekeep1->id,
                                        'calendar_id' => $calendar->id,
                                        'user_id' => $user->id,
                                        'month' => $start_date->month,
                                        'year' => Carbon::now()->year,
                                        'status' => '1',
                                    ]);
                                }
                                if (Carbon::parse($timekeep1->time_in) > (Carbon::parse("07:15:00"))) {
                                    detail_timekeep::create([
                                        "timekeep_id" => $timekeep1->id,
                                        'calendar_id' => $calendar->id,
                                        'user_id' => $user->id,
                                        'month' => $start_date->month,
                                        'year' => Carbon::now()->year,
                                        'status' => '2',
                                    ]);
                                }
                                if (Carbon::parse($timekeep1->time_out) < (Carbon::parse("21:45:00"))) {
                                    detail_timekeep::create([
                                        "timekeep_id" => $timekeep1->id,
                                        'calendar_id' => $calendar->id,
                                        'user_id' => $user->id,
                                        'month' => $start_date->month,
                                        'year' => Carbon::now()->year,
                                        'status' => '3',
                                    ]);
                                }
                            } else {
                                if (
                                    Carbon::parse($timekeep1->time_in)->lessThan(Carbon::parse("07:15:00")) &&
                                    Carbon::parse($timekeep1->time_out)->greaterThan(Carbon::parse("11:45:00"))
                                ) {
                                    detail_timekeep::create([
                                        "timekeep_id" => $timekeep1->id,
                                        'calendar_id' => $calendar->id,
                                        'user_id' => $user->id,
                                        'month' => $start_date->month,
                                        'year' => Carbon::now()->year,
                                        'status' => '1',
                                    ]);
                                }

                                if (Carbon::parse($timekeep1->time_in)->greaterThan(Carbon::parse("07:15:00"))) {
                                    detail_timekeep::create([
                                        "timekeep_id" => $timekeep1->id,
                                        'calendar_id' => $calendar->id,
                                        'user_id' => $user->id,
                                        'month' => $start_date->month,
                                        'year' => Carbon::now()->year,
                                        'status' => '2',
                                    ]);
                                }
                                if (Carbon::parse($timekeep1->time_out)->lessThan(Carbon::parse("11:45:00"))) {
                                    detail_timekeep::create([
                                        "timekeep_id" => $timekeep1->id,
                                        'calendar_id' => $calendar->id,
                                        'user_id' => $user->id,
                                        'month' => $start_date->month,
                                        'year' => Carbon::now()->year,
                                        'status' => '3',
                                    ]);
                                }
                            }
                        }
                    } else {
                        if ($schedule1->shift_2 == 1) {
                            if ($schedule1->shift_3 == 1) {
                                if (
                                    Carbon::parse($timekeep1->time_in)->lessThan(Carbon::parse("12:15:00")) &&
                                    Carbon::parse($timekeep1->time_out)->greaterThan(Carbon::parse("21:45:00"))
                                ) {
                                    detail_timekeep::create([
                                        "timekeep_id" => $timekeep1->id,
                                        'calendar_id' => $calendar->id,
                                        'user_id' => $user->id,
                                        'month' => $start_date->month,
                                        'year' => Carbon::now()->year,
                                        'status' => '1',
                                    ]);
                                }
                                if (Carbon::parse($timekeep1->time_in)->greaterThan(Carbon::parse("12:15:00"))) {
                                    detail_timekeep::create([
                                        "timekeep_id" => $timekeep1->id,
                                        'calendar_id' => $calendar->id,
                                        'user_id' => $user->id,
                                        'month' => $start_date->month,
                                        'year' => Carbon::now()->year,
                                        'status' => '2',
                                    ]);
                                }
                                if (Carbon::parse($timekeep1->time_out)->lessThan(Carbon::parse("21:45:00"))) {
                                    detail_timekeep::create([
                                        "timekeep_id" => $timekeep1->id,
                                        'calendar_id' => $calendar->id,
                                        'user_id' => $user->id,
                                        'month' => $start_date->month,
                                        'year' => Carbon::now()->year,
                                        'status' => '3',
                                    ]);
                                }
                            } else {
                                if (
                                    Carbon::parse($timekeep1->time_in)->lessThan(Carbon::parse("12:15:00")) &&
                                    Carbon::parse($timekeep1->time_out)->greaterThan(Carbon::parse("16:45:00"))
                                ) {
                                    detail_timekeep::create([
                                        "timekeep_id" => $timekeep1->id,
                                        'calendar_id' => $calendar->id,
                                        'user_id' => $user->id,
                                        'month' => $start_date->month,
                                        'year' => Carbon::now()->year,
                                        'status' => '1',
                                    ]);
                                }

                                if (Carbon::parse($timekeep1->time_in)->greaterThan(Carbon::parse("12:15:00"))) {
                                    detail_timekeep::create([
                                        "timekeep_id" => $timekeep1->id,
                                        'calendar_id' => $calendar->id,
                                        'user_id' => $user->id,
                                        'status' => '2',
                                    ]);
                                }
                                if (Carbon::parse($timekeep1->time_out)->lessThan(Carbon::parse("16:45:00"))) {
                                    detail_timekeep::create([
                                        "timekeep_id" => $timekeep1->id,
                                        'calendar_id' => $calendar->id,
                                        'user_id' => $user->id,
                                        'month' => $start_date->month,
                                        'year' => Carbon::now()->year,
                                        'status' => '3',
                                    ]);
                                }
                            }
                        } else {
                            if ($schedule1->shift_3 == 1) {
                                if (
                                    Carbon::parse($timekeep1->time_in)->lessThan(Carbon::parse("17:15:00")) &&
                                    Carbon::parse($timekeep1->time_out)->greaterThan(Carbon::parse("21:45:00"))
                                ) {
                                    detail_timekeep::create([
                                        "timekeep_id" => $timekeep1->id,
                                        'calendar_id' => $calendar->id,
                                        'user_id' => $user->id,
                                        'month' => $start_date->month,
                                        'year' => Carbon::now()->year,
                                        'status' => '1',
                                    ]);
                                }
                                if (Carbon::parse($timekeep1->time_in)->greaterThan(Carbon::parse("17:15:00"))) {
                                    detail_timekeep::create([
                                        "timekeep_id" => $timekeep1->id,
                                        'calendar_id' => $calendar->id,
                                        'user_id' => $user->id,
                                        'month' => $start_date->month,
                                        'year' => Carbon::now()->year,
                                        'status' => '2',
                                    ]);
                                }
                                if (Carbon::parse($timekeep1->time_out)->lessThan(Carbon::parse("21:45:00"))) {
                                    detail_timekeep::create([
                                        "timekeep_id" => $timekeep1->id,
                                        'calendar_id' => $calendar->id,
                                        'user_id' => $user->id,
                                        'month' => $start_date->month,
                                        'year' => Carbon::now()->year,
                                        'status' => '3',
                                    ]);
                                }
                            } else {
                                detail_timekeep::create([
                                    "timekeep_id" => $timekeep1->id,
                                    'calendar_id' => $calendar->id,
                                    'user_id' => $user->id,
                                    'month' => $start_date->month,
                                    'year' => Carbon::now()->year,
                                    'status' => '4',
                                ]);
                                $timekeep1->update([
                                    'time_in' => Carbon::parse("00:00:00"),
                                    'time_out' => Carbon::parse("00:00:00"),
                                ]);
                            }
                        }
                    }
                }
            }
        }
        // foreach ($calendar_users as $calendar_user) {
        //     $calendar = Calendar::where("id", $calendar_user->calendar_id)->first()->start_date;
        //
        // }






        // for ($i = 0; $i <= 6; $i++) {
        //     $schedule2 = Schedule::where('calendar_id', $calendar1->id)->where('day', $i)->first();
        //     $timekeep2 = timekeep::create([
        //         "calendar_id" => $calendar2->id,
        //         'date' => Carbon::parse($calendar2->start_dat)->copy()->addDays($i),
        //         'schedule_id' => Schedule::where('calendar_id', $calendar2->id)->where('day', $i)->first()->id,
        //         'time_in' => Carbon::parse("07:00:00")->addMinutes(rand(-60, 60)),
        //         'time_out' => Carbon::parse("15:00:00")->addMinutes(rand(-60, 60)),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        //     if ($schedule2->shift_1 == 1) {
        //         if ($schedule2->shift_2 == 1) {
        //             if ($schedule2->shift_3 == 1) {
        //                 if (
        //                     Carbon::parse($timekeep2->time_in)->lessThan(Carbon::parse("07:15:00")) &&
        //                     Carbon::parse($timekeep2->time_out)->greaterThan(Carbon::parse("21:45:00"))
        //                 ) {
        //                     detail_timekeep::create([
        //                         'timekeep_id' => $timekeep2->id,
        //                         'status' => '1',
        //                     ]);
        //                 }
        //                 if (Carbon::parse($timekeep2->time_in)->greaterThan(Carbon::parse("07:15:00"))) {
        //                     detail_timekeep::create([
        //                         'timekeep_id' => $timekeep2->id,
        //                         'status' => '2',
        //                     ]);
        //                 }
        //                 if (Carbon::parse($timekeep2->time_out)->lessThan(Carbon::parse("21:45:00"))) {
        //                     detail_timekeep::create([
        //                         'timekeep_id' => $timekeep2->id,
        //                         'status' => '3',
        //                     ]);
        //                 }
        //             } else {
        //                 if (
        //                     Carbon::parse($timekeep2->time_in)->lessThan(Carbon::parse("07:15:00")) &&
        //                     Carbon::parse($timekeep2->time_out)->greaterThan(Carbon::parse("16:45:00"))
        //                 ) {
        //                     detail_timekeep::create([
        //                         'timekeep_id' => $timekeep2->id,
        //                         'status' => '1',
        //                     ]);
        //                 }

        //                 if (Carbon::parse($timekeep2->time_in)->greaterThan(Carbon::parse("07:15:00"))) {
        //                     detail_timekeep::create([
        //                         'timekeep_id' => $timekeep2->id,
        //                         'status' => '2',
        //                     ]);
        //                 }
        //                 if (Carbon::parse($timekeep2->time_out)->lessThan(Carbon::parse("16:45:00"))) {
        //                     detail_timekeep::create([
        //                         'timekeep_id' => $timekeep2->id,
        //                         'status' => '3',
        //                     ]);
        //                 }
        //             }
        //         } else {
        //             if ($schedule2->shift_3 == 1) {
        //                 if (
        //                     Carbon::parse($timekeep2->time_in)->lessThan(Carbon::parse("07:15:00")) &&
        //                     Carbon::parse($timekeep2->time_out)->greaterThan(Carbon::parse("21:45:00"))
        //                 ) {
        //                     detail_timekeep::create([
        //                         'timekeep_id' => $timekeep2->id,
        //                         'status' => '1',
        //                     ]);
        //                 }
        //                 if (Carbon::parse($timekeep2->time_in)->greaterThan(Carbon::parse("07:15:00"))) {
        //                     detail_timekeep::create([
        //                         'timekeep_id' => $timekeep2->id,
        //                         'status' => '2',
        //                     ]);
        //                 }
        //                 if (Carbon::parse($timekeep2->time_out)->lessThan(Carbon::parse("21:45:00"))) {
        //                     detail_timekeep::create([
        //                         'timekeep_id' => $timekeep2->id,
        //                         'status' => '3',
        //                     ]);
        //                 }
        //             } else {
        //                 if (
        //                     Carbon::parse($timekeep2->time_in)->lessThan(Carbon::parse("07:15:00")) &&
        //                     Carbon::parse($timekeep2->time_out)->greaterThan(Carbon::parse("11:45:00"))
        //                 ) {
        //                     detail_timekeep::create([
        //                         'timekeep_id' => $timekeep2->id,
        //                         'status' => '1',
        //                     ]);
        //                 }

        //                 if (Carbon::parse($timekeep2->time_in)->greaterThan(Carbon::parse("07:15:00"))) {
        //                     detail_timekeep::create([
        //                         'timekeep_id' => $timekeep2->id,
        //                         'status' => '2',
        //                     ]);
        //                 }
        //                 if (Carbon::parse($timekeep2->time_out)->lessThan(Carbon::parse("11:45:00"))) {
        //                     detail_timekeep::create([
        //                         'timekeep_id' => $timekeep2->id,
        //                         'status' => '3',
        //                     ]);
        //                 }
        //             }
        //         }
        //     } else {
        //         if ($schedule2->shift_2 == 1) {
        //             if ($schedule2->shift_3 == 1) {
        //                 if (
        //                     Carbon::parse($timekeep2->time_in)->lessThan(Carbon::parse("12:15:00")) &&
        //                     Carbon::parse($timekeep2->time_out)->greaterThan(Carbon::parse("21:45:00"))
        //                 ) {
        //                     detail_timekeep::create([
        //                         'timekeep_id' => $timekeep2->id,
        //                         'status' => '1',
        //                     ]);
        //                 }
        //                 if (Carbon::parse($timekeep2->time_in)->greaterThan(Carbon::parse("12:15:00"))) {
        //                     detail_timekeep::create([
        //                         'timekeep_id' => $timekeep2->id,
        //                         'status' => '2',
        //                     ]);
        //                 }
        //                 if (Carbon::parse($timekeep2->time_out)->lessThan(Carbon::parse("21:45:00"))) {
        //                     detail_timekeep::create([
        //                         'timekeep_id' => $timekeep2->id,
        //                         'status' => '3',
        //                     ]);
        //                 }
        //             } else {
        //                 if (
        //                     Carbon::parse($timekeep2->time_in)->lessThan(Carbon::parse("12:15:00")) &&
        //                     Carbon::parse($timekeep2->time_out)->greaterThan(Carbon::parse("16:45:00"))
        //                 ) {
        //                     detail_timekeep::create([
        //                         'timekeep_id' => $timekeep2->id,
        //                         'status' => '1',
        //                     ]);
        //                 }

        //                 if (Carbon::parse($timekeep2->time_in)->greaterThan(Carbon::parse("12:15:00"))) {
        //                     detail_timekeep::create([
        //                         'timekeep_id' => $timekeep2->id,
        //                         'status' => '2',
        //                     ]);
        //                 }
        //                 if (Carbon::parse($timekeep2->time_out)->lessThan(Carbon::parse("16:45:00"))) {
        //                     detail_timekeep::create([
        //                         'timekeep_id' => $timekeep2->id,
        //                         'status' => '3',
        //                     ]);
        //                 }
        //             }
        //         } else {
        //             if ($schedule2->shift_3 == 1) {
        //                 if (
        //                     Carbon::parse($timekeep2->time_in)->lessThan(Carbon::parse("17:15:00")) &&
        //                     Carbon::parse($timekeep2->time_out)->greaterThan(Carbon::parse("21:45:00"))
        //                 ) {
        //                     detail_timekeep::create([
        //                         'timekeep_id' => $timekeep2->id,
        //                         'status' => '1',
        //                     ]);
        //                 }
        //                 if (Carbon::parse($timekeep2->time_in)->greaterThan(Carbon::parse("17:15:00"))) {
        //                     detail_timekeep::create([
        //                         'timekeep_id' => $timekeep2->id,
        //                         'status' => '2',
        //                     ]);
        //                 }
        //                 if (Carbon::parse($timekeep2->time_out)->lessThan(Carbon::parse("21:45:00"))) {
        //                     detail_timekeep::create([
        //                         'timekeep_id' => $timekeep2->id,
        //                         'status' => '3',
        //                     ]);
        //                 }
        //             } else {
        //                 detail_timekeep::create([
        //                     'timekeep_id' => $timekeep2->id,
        //                     'status' => '4',
        //                 ]);
        //             }
        //         }
        //     }
        // }

        // for ($i = 0; $i <= 6; $i++) {
        //     $schedule3 = Schedule::where('calendar_id', $calendar1->id)->where('day', $i)->first();
        //     $timekeep3 = timekeep::create([
        //         "calendar_id" => $calendar3->id,
        //         'date' => Carbon::parse($calendar3->start_date)->copy()->addDays($i),
        //         'schedule_id' => Schedule::where('calendar_id', $calendar3->id)->where('day', $i)->first()->id,
        //         'time_in' => Carbon::parse("07:00:00")->addMinutes(rand(-60, 60)),
        //         'time_out' => Carbon::parse("12:00:00")->addMinutes(rand(-60, 60)),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        //     if ($schedule3->shift_1) {
        //         if ($schedule3->shift_2) {
        //             if ($schedule3->shift_3) {
        //                 if (
        //                     Carbon::parse($timekeep3->time_in)->lessThan(Carbon::parse("07:15:00")) &&
        //                     Carbon::parse($timekeep3->time_out)->greaterThan(Carbon::parse("21:45:00"))
        //                 ) {
        //                     detail_timekeep::create([
        //                         'timekeep_id' => $timekeep3->id,
        //                         'status' => '1',
        //                     ]);
        //                 }
        //                 if (Carbon::parse($timekeep3->time_in)->greaterThan(Carbon::parse("07:15:00"))) {
        //                     detail_timekeep::create([
        //                         'timekeep_id' => $timekeep3->id,
        //                         'status' => '2',
        //                     ]);
        //                 }
        //                 if (Carbon::parse($timekeep3->time_out)->lessThan(Carbon::parse("21:45:00"))) {
        //                     detail_timekeep::create([
        //                         'timekeep_id' => $timekeep3->id,
        //                         'status' => '3',
        //                     ]);
        //                 }
        //             } else {
        //                 if (
        //                     Carbon::parse($timekeep3->time_in)->lessThan(Carbon::parse("07:15:00")) &&
        //                     Carbon::parse($timekeep3->time_out)->greaterThan(Carbon::parse("16:45:00"))
        //                 ) {
        //                     detail_timekeep::create([
        //                         'timekeep_id' => $timekeep3->id,
        //                         'status' => '1',
        //                     ]);
        //                 }

        //                 if (Carbon::parse($timekeep3->time_in)->greaterThan(Carbon::parse("07:15:00"))) {
        //                     detail_timekeep::create([
        //                         'timekeep_id' => $timekeep3->id,
        //                         'status' => '2',
        //                     ]);
        //                 }
        //                 if (Carbon::parse($timekeep3->time_out)->lessThan(Carbon::parse("16:45:00"))) {
        //                     detail_timekeep::create([
        //                         'timekeep_id' => $timekeep3->id,
        //                         'status' => '3',
        //                     ]);
        //                 }
        //             }
        //         } else {
        //             if ($schedule3->shift_3) {
        //                 if (
        //                     Carbon::parse($timekeep3->time_in)->lessThan(Carbon::parse("07:15:00")) &&
        //                     Carbon::parse($timekeep3->time_out)->greaterThan(Carbon::parse("21:45:00"))
        //                 ) {
        //                     detail_timekeep::create([
        //                         'timekeep_id' => $timekeep3->id,
        //                         'status' => '1',
        //                     ]);
        //                 }
        //                 if (Carbon::parse($timekeep3->time_in)->greaterThan(Carbon::parse("07:15:00"))) {
        //                     detail_timekeep::create([
        //                         'timekeep_id' => $timekeep3->id,
        //                         'status' => '2',
        //                     ]);
        //                 }
        //                 if (Carbon::parse($timekeep3->time_out)->lessThan(Carbon::parse("21:45:00"))) {
        //                     detail_timekeep::create([
        //                         'timekeep_id' => $timekeep3->id,
        //                         'status' => '3',
        //                     ]);
        //                 }
        //             } else {
        //                 if (
        //                     Carbon::parse($timekeep3->time_in)->lessThan(Carbon::parse("07:15:00")) &&
        //                     Carbon::parse($timekeep3->time_out)->greaterThan(Carbon::parse("11:45:00"))
        //                 ) {
        //                     detail_timekeep::create([
        //                         'timekeep_id' => $timekeep3->id,
        //                         'status' => '1',
        //                     ]);
        //                 }

        //                 if (Carbon::parse($timekeep3->time_in)->greaterThan(Carbon::parse("07:15:00"))) {
        //                     detail_timekeep::create([
        //                         'timekeep_id' => $timekeep3->id,
        //                         'status' => '2',
        //                     ]);
        //                 }
        //                 if (Carbon::parse($timekeep3->time_out)->lessThan(Carbon::parse("11:45:00"))) {
        //                     detail_timekeep::create([
        //                         'timekeep_id' => $timekeep3->id,
        //                         'status' => '3',
        //                     ]);
        //                 }
        //             }
        //         }
        //     } else {
        //         if ($schedule3->shift_2) {
        //             if ($schedule3->shift_3) {
        //                 if (
        //                     Carbon::parse($timekeep3->time_in)->lessThan(Carbon::parse("12:15:00")) &&
        //                     Carbon::parse($timekeep3->time_out)->greaterThan(Carbon::parse("21:45:00"))
        //                 ) {
        //                     detail_timekeep::create([
        //                         'timekeep_id' => $timekeep3->id,
        //                         'status' => '1',
        //                     ]);
        //                 }
        //                 if (Carbon::parse($timekeep3->time_in)->greaterThan(Carbon::parse("12:15:00"))) {
        //                     detail_timekeep::create([
        //                         'timekeep_id' => $timekeep3->id,
        //                         'status' => '2',
        //                     ]);
        //                 }
        //                 if (Carbon::parse($timekeep3->time_out)->lessThan(Carbon::parse("21:45:00"))) {
        //                     detail_timekeep::create([
        //                         'timekeep_id' => $timekeep3->id,
        //                         'status' => '3',
        //                     ]);
        //                 }
        //             } else {
        //                 if (
        //                     Carbon::parse($timekeep3->time_in)->lessThan(Carbon::parse("12:15:00")) &&
        //                     Carbon::parse($timekeep3->time_out)->greaterThan(Carbon::parse("16:45:00"))
        //                 ) {
        //                     detail_timekeep::create([
        //                         'timekeep_id' => $timekeep3->id,
        //                         'status' => '1',
        //                     ]);
        //                 }

        //                 if (Carbon::parse($timekeep3->time_in)->greaterThan(Carbon::parse("12:15:00"))) {
        //                     detail_timekeep::create([
        //                         'timekeep_id' => $timekeep3->id,
        //                         'status' => '2',
        //                     ]);
        //                 }
        //                 if (Carbon::parse($timekeep3->time_out)->lessThan(Carbon::parse("16:45:00"))) {
        //                     detail_timekeep::create([
        //                         'timekeep_id' => $timekeep3->id,
        //                         'status' => '3',
        //                     ]);
        //                 }
        //             }
        //         } else {
        //             if ($schedule3->shift_3) {
        //                 if (
        //                     Carbon::parse($timekeep3->time_in)->lessThan(Carbon::parse("17:15:00")) &&
        //                     Carbon::parse($timekeep3->time_out)->greaterThan(Carbon::parse("21:45:00"))
        //                 ) {
        //                     detail_timekeep::create([
        //                         'timekeep_id' => $timekeep3->id,
        //                         'status' => '1',
        //                     ]);
        //                 }
        //                 if (Carbon::parse($timekeep3->time_in)->greaterThan(Carbon::parse("17:15:00"))) {
        //                     detail_timekeep::create([
        //                         'timekeep_id' => $timekeep3->id,
        //                         'status' => '2',
        //                     ]);
        //                 }
        //                 if (Carbon::parse($timekeep3->time_out)->lessThan(Carbon::parse("21:45:00"))) {
        //                     detail_timekeep::create([
        //                         'timekeep_id' => $timekeep3->id,
        //                         'status' => '3',
        //                     ]);
        //                 }
        //             } else {
        //                 detail_timekeep::create([
        //                     'timekeep_id' => $timekeep3->id,
        //                     'status' => '4',
        //                 ]);
        //             }
        //         }
        //     }
        // }
    }
}
