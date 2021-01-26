<?php

namespace Domains\Teams\Http\Controllers\Admin;

use Domains\Teams\Actions\TeamMembersAction;
use Domains\Teams\Notifications\TeamMemberInvite;
use Parents\Controllers\WebController as Controller;
use Domains\Teams\Models\Team;
use Parents\Requests\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\URL;

class TeamMembersController extends Controller
{
    public function index(TeamMembersAction $action): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $viewModel = $action();
        return view('admin.team-members.index', [
            'viewModel' => $viewModel
        ]);
    }

    public function invite(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate(['email' => 'email']);
        $team    = Team::where('owner_id', auth()->user()->id)->firstOrFail();
        $url     = URL::signedRoute('register', ['team' => $team->id]);
        $message = new TeamMemberInvite($url);
        Notification::route('mail', $request->input('email'))->notify($message);

        return redirect()->back()->with('message', 'Invite sent.');
    }
}
