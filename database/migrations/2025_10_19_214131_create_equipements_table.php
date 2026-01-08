<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\CategorieEquipement;
use App\Models\Marque;
use App\Models\Demandeur;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('equipements', function (Blueprint $table) {
            $table->id();
            $table->string('designation');
            $table->string('modele');
            $table->string('statut');

            $table->string('certificat')->nullable();

            $table->foreignIdFor(CategorieEquipement::class, 'category_id')
                  ->nullable()
                  ->constrained()
                  ->nullOnDelete();

            $table->foreignIdFor(Marque::class)
                  ->nullable()
                  ->constrained()
                  ->nullOnDelete();

            $table->foreignIdFor(Demandeur::class)
                  ->constrained()
                  ->restrictOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipements');
    }
};
