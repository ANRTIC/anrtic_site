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
        Schema::create('avis_decisions', function (Blueprint $table) {
            $table->id();
            $table->string("reference");
            $table->text("description");
            $table->text("document");
            $table->boolean("is_online")->default(true);
            $table->date("adopted_at");
            $table->date("published_at");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avis_decisions');
    }
};
