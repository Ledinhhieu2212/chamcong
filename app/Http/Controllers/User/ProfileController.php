<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserEditRequest;
use App\Models\Position;
use App\Models\User;
use App\Repositories\User\UserRepositoryInterfaces;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ProfileController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterfaces $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function edit()
    {
        $user_account = Auth::user();
        $position = Position::find($user_account->position_id);
        $qrCode = QrCode::format('png')->size(500)->generate($user_account->qr_code);
        $base64QrCode = base64_encode($qrCode);
        return view("user.profile.index", compact("position","base64QrCode", 'user_account'));
    }

    public function update(UserEditRequest $request)
    {
        $this->userRepository->profile($request);
        return redirect()->route("profile")->with("success", "Sửa thông tin thành công");
    }
}
