<?php

namespace App\Repositories\User;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\Detail_Calendar;
use App\Models\Schedule;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class UserRepository implements UserRepositoryInterfaces
{
    public function paginate(int $list)
    {
        return User::paginate($list);
    }
    public function UserAll()
    {
        return User::all();
    }
    public function create(UserCreateRequest $request)
    {
        $data = $request->all();
        if ($request->has('image')) {
            $image = $request->file('image');
            $imageName = time() . '-avatar-img.' . $image->getClientOriginalExtension();
            $image->move('assets/img', $imageName);
            $data['image'] = $imageName;
        }
        $data['password'] = Hash::make($request->password);
        $data["email_verified_at"] = Carbon::now();
        $data["updated_at"] = Carbon::now();
        $data["updated_at"] = Carbon::now();
        $data["qr_code"] = hash::make("username=?$request->username?email=?$request->email?password=?$request->password?");
        return User::create($data);
    }

    public function update(UserEditRequest $request, int $id)
    {
        $data = $request->all();
        $user = User::find($id);
        if ($request->hasFile('image')) {
            $path = 'assets/img';
            $image = $request->file('image');
            $imageName = time() . '-avatar-img.' . $image->getClientOriginalExtension();
            if (File::exists(public_path($path) . "/" . $user->image)) {
                File::delete(public_path($path) . "/" . $user->image);
            }
            $image->move(public_path($path), $imageName);
            $data['image'] = $imageName;
        }
        $data["qr_code"] = hash::make("username=?$request->username?email=?$request->email?password=?$request->password?");
        $data["updated_at"] = Carbon::now();
        return $user->update($data);
    }
    public function delete(int $id)
    {
        $user = User::find($id);
        $path = 'assets/img';
        $image = $user->image;
        if (File::exists(public_path($path . "/" . $image))) {
            File::delete(public_path($path . "/" . $image));
        }
        $user->detail_calendars()->delete();
        return $user->delete();
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        foreach ($ids as $id) {
            $user = User::find($id);
            $path = 'assets/img';
            $image = $user->image;
            if (File::exists(public_path($path . "/" . $image))) {
                File::delete(public_path($path . "/" . $image));
            }
            $user->detail_calendars()->delete();
            $user->delete();
        }
        return redirect()->back();
    }


    public function profile(UserEditRequest $request)
    {
        $userId = Auth::user()->id;
        $user = User::find($userId);
        $imageName = "";
        if ($request->hasFile('image')) {
            $path = 'assets/img';
            $image = $request->file('image');
            $imageName = time() . '-avatar-img.' . $image->getClientOriginalExtension();
            $image->move(public_path($path), $imageName);
            if (File::exists(public_path($path) . "/" . $user->image)) {
                File::delete(public_path($path) . "/" . $user->image);
            }
        }
        User::where('id', $userId)->update([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => $request->password,
            'phone' => $request->phone,
            'address' => $request->address,
            'birthday' => $request->birthday,
            'cccd' => $request->cccd,
            'sex' => $request->sex,
            'updated_at' => Carbon::now(),
            "qr_code" => hash::make("username=?$user->username?email=?$request->email?password=?$request->password?"),
            'image' => ($imageName == "") ? $user->image : $imageName,
        ]);
    }

    public function searchCalendar(Request $request)
    {
    }

    public function registerCalendar(Request $request)
    {
        $shifts_1 = $request->input("shift_1", []);
        $shifts1 = $request->input("shift1", []);

        $shifts_2 = $request->input("shift_2", []);
        $shifts2 = $request->input("shift2", []);

        $shifts_3 = $request->input("shift_3", []);
        $shifts3 = $request->input("shift3", []);

        foreach ($shifts1 as $key => $value) {
            if (array_key_exists($key, $shifts_1) && $shifts_1[$key] === "1") {
                $shifts1[$key] = $shifts_1[$key];
            }
        }
        foreach ($shifts2 as $key => $value) {
            if (array_key_exists($key, $shifts_2) && $shifts_2[$key] === "1") {
                $shifts2[$key] = $shifts_2[$key];
            }
        }
        foreach ($shifts3 as $key => $value) {
            if (array_key_exists($key, $shifts_3) && $shifts_3[$key] === "1") {
                $shifts3[$key] = $shifts_3[$key];
            }
        }
        $calendar = DB::table('calendars')
            ->join('detail_calendars', 'calendars.id', '=', 'detail_calendars.calendar_id')
            ->select('detail_calendars.id')
            ->where('detail_calendars.user_id', '=', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->first();
        for ($i = 1; $i <= 6; $i++) {
            Schedule::create(
                [
                    "day" => $i,
                    'detail_calendar_id' => $calendar->id,
                    'shift_1' => $shifts1[$i],
                    'shift_2'  => $shifts2[$i],
                    'shift_3' => $shifts3[$i],
                ]
            );
        }

        $detail_calendar = Detail_Calendar::find($calendar->id);
        $detail_calendar->update([
            'is_registered' => 1,
        ]);
    }
}
