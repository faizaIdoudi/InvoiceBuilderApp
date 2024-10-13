<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    function index(){
        $clients = Client::orderBy('id','desc')->get();
        return inertia('Client/Index' ,compact('clients'));
    }
    public function create()
{
    return inertia('Client/Create');
    
}

public function store(Request $request)
{
    $request->validate([
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'matricule' => 'required|string|max:255',
        'numero_telephone' => 'required|string|max:20',
        'adresse' => 'required|string|max:255',
    ]);

    // Create a new client
    Client::create([
        'nom' => $request->nom,
        'prenom' => $request->prenom,
        'matricule' => $request->matricule,
        'numero_telephone' => $request->numero_telephone,
        'adresse' => $request->adresse,
    ]);

    return redirect()->route('client.index')->with('success', 'Client added successfully.');
}
public function edit($id)
{
    $client = Client::findOrFail($id);
    return inertia('Client/Edit', compact('client'));
}

public function update(Request $request, $id)
{
    $client = Client::findOrFail($id);

    $request->validate([
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'matricule' => 'required|string|max:255',
        'numero_telephone' => 'required|string|max:20',
        'adresse' => 'required|string|max:255',
    ]);

    $client->update($request->all());

    return redirect()->route('client.index')->with('success', 'Client updated successfully.');
}
public function destroy($id)
{
    $client = Client::findOrFail($id);
    $client->delete();

    return redirect()->route('client.index')->with('success', 'Client removed successfully.');
}

}
