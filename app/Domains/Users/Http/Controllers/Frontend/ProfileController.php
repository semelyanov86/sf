<?php

namespace Domains\Users\Http\Controllers\Frontend;

use Parents\Controllers\Controller;
use Domains\Users\Http\Requests\UpdatePasswordRequest;
use Domains\Users\Http\Requests\UpdateProfileRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProfileController extends Controller
{
    public function index(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('frontend.profile');
    }

    public function update(UpdateProfileRequest $request): \Illuminate\Http\RedirectResponse
    {
        $user = auth()->user();

        $user->update($request->validated());

        return redirect()->route('frontend.profile.index')->with('message', __('global.update_profile_success'));
    }

    public function destroy(): \Illuminate\Http\RedirectResponse
    {
        $user = auth()->user();

        $user->update([
            'email' => time() . '_' . $user->email,
        ]);

        $user->delete();

        return redirect()->route('login')->with('message', __('global.delete_account_success'));
    }

    public function password(UpdatePasswordRequest $request): \Illuminate\Http\RedirectResponse
    {
        auth()->user()->update($request->validated());

        return redirect()->route('frontend.profile.index')->with('message', __('global.change_password_success'));
    }
}
