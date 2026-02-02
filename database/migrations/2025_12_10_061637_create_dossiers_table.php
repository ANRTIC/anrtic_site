<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('dossiers', function (Blueprint $table) {
            $table->id();  
            $table->string("numero");
            $table->foreignId("client_id")
                ->references("id")->on("users")
                ->restrictOnDelete();
            $table->foreignId("agent_id")
                ->references("id")->on("users")
                ->restrictOnDelete();
            $table->timestamps();  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('dossiers');
    }
};
