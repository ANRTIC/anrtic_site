<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\CategorieEquipement;
use App\Models\Marque;
<<<<<<< HEAD
<<<<<<< HEAD
use App\Models\Certificat;
=======
>>>>>>> main
=======
use App\Models\Certificat;
>>>>>>> origin/branch-homologation
use App\Models\Demandeur;

return new class extends Migration
{
<<<<<<< HEAD
<<<<<<< HEAD
    /**
     * Run the migrations.
     */
=======
    
>>>>>>> main
=======
    /**
     * Run the migrations.
     */
>>>>>>> origin/branch-homologation
    public function up(): void
    {
        Schema::create('equipements', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> origin/branch-homologation
            $table->string("designation");
            $table->string("modele");
            $table->string("statut");
            $table->foreignIdFor(CategorieEquipement::class, "category_id")->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Marque::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Demandeur::class)->constrained()->restrictOnDelete();
<<<<<<< HEAD
=======
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

>>>>>>> main
=======
>>>>>>> origin/branch-homologation
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
