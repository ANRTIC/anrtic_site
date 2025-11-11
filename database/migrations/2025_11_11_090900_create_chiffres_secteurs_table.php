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
        Schema::create('chiffres_secteurs', function (Blueprint $table) {
            $table->id();
            $table->text("icon");
            $table->string("label");
            $table->string("sector");
            $table->string("source");
            $table->boolean("is_online")->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chiffres_secteurs');
    }
};
