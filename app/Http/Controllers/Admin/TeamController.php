<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function index() {
        $teams = Team::orderBy('id', 'desc')->get();
        return inertia('Team/Index', ['teams' => $teams]);
    }
    
    public function show(Team $team) {
        return inertia('Team/show',compact('team'));
    }

    public function create(){
        return inertia('Team/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|unique:teams,email',
            'password' => 'required|string|min:8',
        ]);

        $team = new Team();
        $team->first_name = $request->first_name;
        $team->surname = $request->surname;
        $team->email = $request->email;
        $team->password = bcrypt($request->password);
        $team->save();

        return redirect()->route('team.index');
    }

      public function edit($id) {
        $team = Team::where('id',$id)->firstOrFail();
        return inertia('Team/Edit',compact('team'));
    }

    public function update(Request $request,$id) {
        
        $team = Team::where('id',$id)->firstOrFail();
        $team->first_name = $request->first_name;
        $team->surname = $request->surname;
        $team->email = $request->email;
        $team->password = bcrypt($request->password);
        $team->save();
        return redirect()->route('team.index');
    }

    public function destroy($id)
{
    $team = Team::findOrFail($id); // Add the missing semicolon here
    $team->delete();

    return redirect()->route('team.index')->with('success', 'Client removed successfully.');
}


    
}
