<?php

namespace Database\Seeders;

use App\Models\Position;
use App\Models\Salary;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Salary::query()->delete();
        $employees = User::all();
        foreach ($employees as $employee) {
            for ($i = 3; $i <= 5; $i++) {
                $position = Position::where("id", $employee->position_id)->first();
                $salary = Salary::create([
                    "user_id" => $employee->id,
                    'position_id' => $employee->position_id,
                    'month' => $i,
                    'year' => Carbon::now()->year,
                    'reward' => random_int(5, 20),
                ]);
                $timekeep_late = $employee->detail_timekeeps->where('status', 2)->where("month", $salary->month)->where("year", $salary->year)->count() * (float)($position->price / 2);
                $timekeep_early =  $employee->detail_timekeeps->where('status', 3)->where("month", $salary->month)->where("year", $salary->year)->count() * (float)($position->price / 2);
                $unauthorized_leave = $employee->detail_timekeeps->where('status', 6)->where("month", $salary->month)->where("year", $salary->year)->count() * $position->price;
                $punish =  $timekeep_late + $timekeep_early + $unauthorized_leave;
                $shift_1 = $employee->detail_timekeeps->whereIn('status', [1, 2, 3])->where("month", $salary->month)->where("year", $salary->year)->where("shift", 1)->count() ;
                $shift_2 = $employee->detail_timekeeps->whereIn('status', [1, 2, 3])->where("month", $salary->month)->where("year", $salary->year)->where("shift", 2)->count();
                $shift_3 = $employee->detail_timekeeps->whereIn('status', [1, 2, 3])->where("month", $salary->month)->where("year", $salary->year)->where("shift", 3)->count();
                $total = ($position->price * 5 * $shift_1 ) + ($position->price * 10 * $shift_2 ) + ($position->price * 15 * $shift_3 );
                $salary->update([
                    'punish' => $punish,
                    'total' => $total,
                    'total_all' => ( $total + ($total* (float)(($employee->reward)/100))) - $punish,
                ]);
            }
        }
    }
}
