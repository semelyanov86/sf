<?php

namespace Domains\Teams\Http\Controllers\Admin;

use Domains\Teams\Notifications\TeamMemberInvite;
use Parents\Controllers\WebController as Controller;
use Domains\Teams\Models\Team;
use Domains\Users\Models\User;
use Gate;
use Parents\Requests\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class TeamMembersController extends Controller
{
    public function index()
    {
        $team  = Team::where('owner_id', auth()->user()->id)->first();
        $users = User::where('team_id', $team->id)->get();

        return view('admin.team-members.index', compact('team', 'users'));
    }

    public function invite(Request $request)
    {
        $request->validate(['email' => 'email']);
        $team    = Team::where('owner_id', auth()->user()->id)->first();
        $url     = URL::signedRoute('register', ['team' => $team->id]);
        $message = new TeamMemberInvite($url);
        Notification::route('mail', $request->input('email'))->notify($message);

        return redirect()->back()->with('message', 'Invite sent.');
    }
}
