<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Categorie;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('etude_enquetes', function (Blueprint $table) {
            $table->id();
            $table->text("thumbnail")->nullable();
            $table->string("title");
            $table->date("publication_date");
            $table->text("short_description");
            $table->string("slug")->unique();
            $table->longText("content");
            $table->boolean("is_online")->default(false);
            $table->foreignIdFor(Categorie::class, "category_id")->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etude_enquetes');
    }
};
