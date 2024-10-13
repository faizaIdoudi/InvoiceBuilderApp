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
            $table->foreignId('facture_id')->constrained()->onDelete('cascade'); // Foreign key
            $table->integer('nombre'); // Quantity
            $table->string('nom'); // Product name
            $table->date('date_peremption')->nullable(); // Expiry date
            $table->decimal('pht', 10, 2); // Price before tax
            $table->decimal('tva', 10, 2); // VAT
            $table->decimal('pvp', 10, 2); // Sale price
            $table->timestamps();
        });
        
    }

    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
