<?php

namespace Units\Auth\Http\Controllers\Web;

use Parents\Controllers\Controller;
use Domains\Users\Models\User;
use Carbon\Carbon;

class UserVerificationController extends Controller
{
    public function approve($token)
    {
        $user = User::where('verification_token', $token)->first();
        abort_if(!$user, 404);

        $user->verified           = 1;
        $user->verified_at        = Carbon::now();
        $user->verification_token = null;
        $user->save();

        return redirect()->route('login')->with('message', trans('global.emailVerificationSuccess'));
    }
}
