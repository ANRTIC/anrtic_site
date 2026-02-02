<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Equipement;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('photo_equipements', function (Blueprint $table) {
            $table->id();
            $table->text("url");
            $table->foreignId("equipement_id")->nullable()
                  ->references("id")->on("equipements")
                  ->cascadeOnDelete();
            $table->foreignId("equipement_dossier_id")->nullable()
                  ->references("id")->on("equipement_dossiers")
                  ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photo_equipements');
    }
};
