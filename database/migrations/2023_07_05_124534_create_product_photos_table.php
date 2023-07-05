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
        Schema::create('product_photos', function (Blueprint $table) {
            $table->id();
            $table->string('description', 100)->nullable();
            $table->string('photo', 500)->nullable();
            $table->tinyInteger('default')->nullable()->default(0);
            $table->tinyInteger('status')->nullable()->default(1);
            $table->timestamps();
            $table->softDeletes();

            $table->foreignId('product_id')->nullable()->constrained('products');
            $table->foreignId('usuario_inclusao_id')->nullable()->constrained('users');
            $table->foreignId('usuario_edicao_id')->nullable()->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_photos');
    }
};
