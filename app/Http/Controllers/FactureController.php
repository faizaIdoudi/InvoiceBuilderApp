<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facture;
use App\Models\Client;
use App\Models\Produit;

class FactureController extends Controller
{
    // Afficher la liste des factures
    public function index()
    {
        $factures = Facture::all(); // Récupérer toutes les factures
        return inertia('Facture/Index', compact('factures'));
    }

    // Afficher le formulaire de création d'une facture
    public function create()
    {
        $clients = Client::all(); // Récupérer tous les clients
        return inertia('Facture/Create', compact('clients'));
    }

  // Enregistrer une nouvelle facture
  public function store(Request $request)
{
    \Log::info('Store method called');

    $validated = $request->validate([
        'numero_facture' => 'required|string|max:255|unique:factures',
        'nom_fournisseur' => 'required|string|max:255',
        'nom_client' => 'required|string|max:255',
        'matricule_client' => 'required|string|max:255',
        'date_facture' => 'required|date',
        'produits.*.nombre' => 'required|integer|min:1',
        'produits.*.nom' => 'required|string|max:255',
        'produits.*.date_peremption' => 'required|date',
        'produits.*.pht' => 'required|numeric|min:0',
        'produits.*.tva' => 'required|numeric|min:0',
        'produits.*.pvp' => 'required|numeric|min:0',
    ]);

    \Log::info('Validation passed', $validated);

    $total_ht = 0;
    $total_tva = 0;
    $total_ttc = 0;

    foreach ($validated['produits'] as $produit) {
        $total_ht += $produit['pht'] * $produit['nombre'];
        $total_tva += $produit['tva'] * $produit['nombre'];
        $total_ttc += $produit['pvp'] * $produit['nombre'];
    }

    if ($total_ht === null || $total_tva === null || $total_ttc === null) {
        return redirect()->back()->withErrors(['error' => 'Les totaux ne peuvent pas être nuls.']);
    }

    try {
        $facture = Facture::create([
            'numero_facture' => $validated['numero_facture'],
            'nom_fournisseur' => $validated['nom_fournisseur'],
            'nom_client' => $validated['nom_client'],
            'matricule_client' => $validated['matricule_client'],
            'date_facture' => $validated['date_facture'],
            'produits' => json_encode($validated['produits']),
            'total_ht' => $total_ht,
            'total_tva' => $total_tva,
            'total_ttc' => $total_ttc,
        ]);

        \Log::info('Facture created', $facture->toArray());

        return redirect()->route('facture.index')->with('success', 'Facture créée avec succès.');
    } catch (\Exception $e) {
        \Log::error('Error creating facture: ' . $e->getMessage());
        return redirect()->back()->withErrors(['error' => 'Erreur lors de la création de la facture.']);
    }
}


  

    



    // Afficher les détails d'une facture
    public function show($id)
    {
        $facture = Facture::findOrFail($id); // Récupérer la facture avec l'ID
        return inertia('Facture/Show', compact('facture'));
    }

    // Afficher le formulaire d'édition d'une facture
    public function edit($id)
    {
        $facture = Facture::findOrFail($id);
        $clients = Client::all();
        return inertia('Facture/Edit', compact('facture', 'clients'));
    }

    // Mettre à jour une facture existante
    public function update(Request $request, $id)
    {
        $request->validate([
            'numero_facture' => 'required|unique:factures,numero_facture,' . $id,
            'nom_fournisseur' => 'required|string|max:255',
            'nom_client' => 'required|string|max:255',
            'matricule_client' => 'required|string|max:255',
            'date_facture' => 'required|date',
            'produits' => 'required|array',
            'total_ht' => 'required|numeric',
            'total_tva' => 'required|numeric',
            'total_ttc' => 'required|numeric',
        ]);

        // Mettre à jour la facture
        $facture = Facture::findOrFail($id);
        $facture->update([
            'numero_facture' => $request->numero_facture,
            'nom_fournisseur' => $request->nom_fournisseur,
            'nom_client' => $request->nom_client,
            'matricule_client' => $request->matricule_client,
            'date_facture' => $request->date_facture,
            'produits' => json_encode($request->produits), // Mettre à jour les produits
            'total_ht' => $request->total_ht,
            'total_tva' => $request->total_tva,
            'total_ttc' => $request->total_ttc,
        ]);

        return redirect()->route('facture.index')->with('success', 'Facture mise à jour avec succès');
    }

    // Supprimer une facture
    public function destroy($id)
    {
        $facture = Facture::findOrFail($id);
        $facture->delete();

        return redirect()->route('facture.index')->with('success', 'Facture supprimée avec succès');
    }
}
