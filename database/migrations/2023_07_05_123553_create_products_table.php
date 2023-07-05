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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 300)->nullable()->unique();
            $table->double('price', 9, 2)->nullable();
            $table->tinyInteger('status')->nullable()->default(1);
            $table->string('link', 300)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreignId('usuario_inclusao_id')->nullable()->constrained('users');
            $table->foreignId('usuario_edicao_id')->nullable()->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
