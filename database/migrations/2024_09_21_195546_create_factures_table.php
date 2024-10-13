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
            $table->string('numero_facture')->unique();
            $table->string('nom_fournisseur');
            $table->string('nom_client');
            $table->string('matricule_client', 50)->nullable(); // Make this nullable
            $table->date('date_facture');
            $table->json('produits')->nullable();
            $table->decimal('total_ht', 10, 2);
            $table->decimal('total_tva', 10, 2);
            $table->decimal('total_ttc', 10, 2);
            $table->timestamps();
        });
        
    }

    public function down(): void
    {
        Schema::dropIfExists('factures');
    }
};
