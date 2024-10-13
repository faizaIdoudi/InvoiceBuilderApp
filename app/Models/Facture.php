<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'numero_facture',
        'nom_fournisseur',
        'nom_client',
        'matricule_client',
        'date_facture',
        'total_ht',
        'total_tva',
        'total_ttc',
        // 'produits' can be handled in the produits relationship
    ];

    // Define the relationship to Produit
    public function produits()
    {
        return $this->hasMany(Produit::class);
    }

    // Method to calculate totals
    public function calculateTotals()
    {
        $total_ht = $this->produits->sum(function ($produit) {
            return $produit->pht * $produit->nombre;
        });

        $total_tva = $this->produits->sum(function ($produit) {
            return $produit->tva * $produit->nombre;
        });

        $total_ttc = $total_ht + $total_tva;

        return [
            'total_ht' => $total_ht,
            'total_tva' => $total_tva,
            'total_ttc' => $total_ttc,
        ];
    
    }
}
