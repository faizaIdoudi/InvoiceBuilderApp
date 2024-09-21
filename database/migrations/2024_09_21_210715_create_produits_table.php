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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('facture_id')->constrained()->onDelete('cascade'); // Lien avec la facture
            $table->integer('nombre'); // Nombre d'unités du produit
            $table->string('nom'); // Nom du produit
            $table->date('date_peremption'); // Date de péremption
            $table->decimal('pht', 10, 2); // Prix hors taxes
            $table->decimal('tva', 10, 2); // Taux de TVA
            $table->decimal('pvp', 10, 2); // Prix de vente public
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
