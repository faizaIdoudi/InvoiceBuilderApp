<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facture;
use App\Models\Client;
use App\Models\Produit;
use DB;

class FactureController extends Controller
{
    // Display the list of invoices
    public function index()
    {
        $factures = Facture::all();
        return inertia('Facture/Index', compact('factures'));
    }

    // Display the form for creating an invoice
    public function create()
    {

        return inertia('Facture/Create');
    }

    // Store a newly created invoice
    public function store(Request $request)
    {
        $validated = $request->validate([
            'numero_facture' => 'required|unique:factures',
            'date_facture' => 'required|date',
            'nom_fournisseur' => 'required|string',
            'nom_client' => 'required|string',
            'products' => 'required|array|min:1',
            'products.*.nom' => 'required|string',
            'products.*.nombre' => 'required|integer|min:1',
            'products.*.pvp' => 'required|numeric|min:0',
        ]);

        // Create the facture
        $facture = Facture::create([
            'numero_facture' => $validated['numero_facture'],
            'date_facture' => $validated['date_facture'],
            'nom_fournisseur' => $validated['nom_fournisseur'],
            'nom_client' => $validated['nom_client'],
            'matricule_client' => $request->matricule_client,
            'total_ht' => 0, // Calculated later
            'total_tva' => 0, // Calculated later
            'total_ttc' => 0, // Calculated later
        ]);

        $total_ht = 0;
        $total_tva = 0;

        // Create products and associate with facture
        foreach ($validated['products'] as $product) {
            $productModel = new Produit([
                'nom' => $product['nom'],
                'nombre' => $product['nombre'],
                'pht' => $product['pvp'], // Price before tax
                'tva' => $product['pvp'] * 0.2, // Assuming 20% VAT
                'pvp' => $product['pvp'],
            ]);

            $facture->produits()->save($productModel);

            // Update totals
            $total_ht += $product['pvp'] * $product['nombre'];
            $total_tva += $productModel->tva * $product['nombre'];
        }

        // Update the totals in the facture
        $facture->update([
            'total_ht' => $total_ht,
            'total_tva' => $total_tva,
            'total_ttc' => $total_ht + $total_tva,
        ]);

        return redirect()->route('facture.index');
    }

    // Display the details of an invoice
    public function show($id)
    {
        $facture = Facture::findOrFail($id);
        return inertia('Facture/Show', compact('facture'));
    }

    // Display the form for editing an invoice
    public function edit($id)
    {
        $facture = Facture::with('produits')->findOrFail($id);
        return inertia('Facture/Edit', [
        'facture' => $facture,
        'products' => $facture->produits
    ]);
    }

  
   // Update an existing invoice
public function update(Request $request, $id)
{
    $validated = $request->validate([
        'numero_facture' => 'required|unique:factures,numero_facture,' . $id,
        'date_facture' => 'required|date',
        'nom_fournisseur' => 'required|string',
        'nom_client' => 'required|string',
        'products' => 'required|array|min:1',
        'products.*.nom' => 'required|string',
        'products.*.nombre' => 'required|integer|min:1',
        'products.*.pvp' => 'required|numeric|min:0',
    ]);

    DB::transaction(function () use ($validated, $id, $request) {
        // Find the existing facture
        $facture = Facture::findOrFail($id);

        // Update the facture details
        $facture->update([
            'numero_facture' => $validated['numero_facture'],
            'date_facture' => $validated['date_facture'],
            'nom_fournisseur' => $validated['nom_fournisseur'],
            'nom_client' => $validated['nom_client'],
            'matricule_client' => $request->matricule_client,
        ]);

        // Reset totals
        $total_ht = 0;
        $total_tva = 0;

        // Delete existing products
        $facture->produits()->delete();

        // Create new products and associate with facture
        foreach ($validated['products'] as $product) {
            $productModel = new Produit([
                'nom' => $product['nom'],
                'nombre' => $product['nombre'],
                'pht' => $product['pvp'], // Price before tax
                'tva' => $product['pvp'] * 0.2, // Assuming 20% VAT
                'pvp' => $product['pvp'],
            ]);

            $facture->produits()->save($productModel);

            // Update totals
            $total_ht += $product['pvp'] * $product['nombre'];
            $total_tva += $productModel->tva * $product['nombre'];
        }

        // Update the totals in the facture
        $facture->update([
            'total_ht' => $total_ht,
            'total_tva' => $total_tva,
            'total_ttc' => $total_ht + $total_tva,
        ]);
    });

    return redirect()->route('facture.index')->with('success', 'Facture updated successfully');
}



    // Delete an invoice
    public function destroy($id)
    {
        $facture = Facture::findOrFail($id);
        $facture->delete();

        return redirect()->route('facture.index')->with('success', 'Invoice deleted successfully!');
    }
}
