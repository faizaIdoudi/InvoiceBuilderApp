<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'facture_id',     // Foreign key to relate to Facture
        'nombre',         // Quantity
        'nom',            // Product name
        'date_peremption', // Expiry date
        'pht',            // Price before tax
        'tva',            // VAT
        'pvp',            // Sale price
    ];

    // Define the relationship to Facture
    public function facture()
    {
        return $this->belongsTo(Facture::class);
    }
}
