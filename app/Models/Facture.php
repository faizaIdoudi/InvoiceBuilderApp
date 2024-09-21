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
    ];

    public function produits()
    {
        return $this->hasMany(Produit::class);
    }
}
