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
        Schema::create('productos', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('nombre');
            $table->integer('codigo');
            $table->integer('unidades');
            $table->string('familia');
            $table->foreignId('proveedor_id')
                ->constrained('proveedores')  // Establece la clave foránea
                ->onDelete('cascade')  // Si se elimina un proveedor, también se eliminan los productos relacionados
                ->onUpdate('cascade');  // Si se actualiza el ID del proveedor, también se actualizan los productos
            $table->timestamps();
        });

    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
