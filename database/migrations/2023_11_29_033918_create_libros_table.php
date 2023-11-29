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
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 50)->nullable();
            $table->integer('ano_publicacion',);
            $table->timestamps();

            //$table->foreign('id_categoria')->references('id')->on('categorias');
            $table->foreignId('id_categoria')
                    ->nullable()        
                    ->constrained('categorias')
                    ->cascadeOnUpdate()
                    ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
