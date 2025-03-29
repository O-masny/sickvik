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
        // Smazání staré tabulky 'galleries' (pokud existuje)
        Schema::dropIfExists('galleries');

        // Vytvoření nové tabulky 'galleries' s novou strukturou
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Název galerie
            $table->text('description')->nullable(); // Popis galerie
            $table->string('file_name'); // Původní obrázek
            $table->string('slider_image')->nullable(); // Minifikovaná verze pro slider
            $table->string('detail_image')->nullable(); // Větší verze pro detailní zobrazení
            $table->timestamps(); // Časy vytvoření a aktualizace
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Pokud bude potřeba, můžeme tabulku odstranit zpět
        Schema::dropIfExists('galleries');
    }
};
