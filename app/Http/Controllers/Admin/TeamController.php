<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    function index(){
        $team = Team::orderBy('id','desc')->get();
        return inertia('Team/Index' ,compact('team'));
    }
}
