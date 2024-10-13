<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FactureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $facture = Facture::create([
            'numero_facture' => 'INV-123456',
            'nom_fournisseur' => 'Supplier Name',
            'nom_client' => 'Client Name',
            'matricule_client' => '12345',
            'date_facture' => now(),
            'total_ht' => 0,
            'total_tva' => 0,
            'total_ttc' => 0,
        ]);

        $facture->produits()->createMany([
            [
                'nombre' => 2,
                'nom' => 'Product A',
                'date_peremption' => '2024-12-31',
                'pht' => 10.00,
                'tva' => 2.00,
                'pvp' => 12.00,
            ],
            [
                'nombre' => 1,
                'nom' => 'Product B',
                'date_peremption' => '2025-01-15',
                'pht' => 20.00,
                'tva' => 4.00,
                'pvp' => 24.00,
            ],
        ]);
    }
    
}
