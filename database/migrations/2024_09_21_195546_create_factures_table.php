<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->string('numero_facture')->unique(); // Numéro unique de la facture
            $table->string('nom_fournisseur'); // Nom du fournisseur
            $table->string('nom_client'); // Nom du client
            $table->string('matricule_client'); // Matricule fiscal ou autre identifiant du client
            $table->date('date_facture'); // Date de la facture
            
            // Colonnes pour chaque produit
            $table->json('produits')->nullable(); // Stocke les détails des produits sous forme JSON
            
            // Totaux globaux pour la facture
            $table->decimal('total_ht', 10, 2); // Total hors taxe (HT)
            $table->decimal('total_tva', 10, 2); // Total de la TVA
            $table->decimal('total_ttc', 10, 2); // Total toutes taxes comprises (TTC)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factures');
    }
};
