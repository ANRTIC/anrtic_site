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
        Schema::create('equipement_dossiers', function (Blueprint $table) {
            $table->id();
            $table->string('designation');
            $table->string('modele');
            $table->longText("description");
            $table->integer("quantite");
            $table->string("pays");
            $table->foreignId("dossier_id")
                ->references("id")->on("dossiers")
                ->restrictOnDelete();
            $table->foreignId("marque_id")
                ->references("id")->on("marques")
                ->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipement_dossiers');
    }
};
