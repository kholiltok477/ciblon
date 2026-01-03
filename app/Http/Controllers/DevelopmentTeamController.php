<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;

class DevelopmentTeamController extends Controller
{
    public function index()
    {
        $teamMembers = TeamMember::all();
        return view('development-team', compact('teamMembers'));
    }
}
