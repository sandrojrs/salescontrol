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
        Schema::create('product_specifications', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->string('size', 50);
            $table->timestamps();
            $table->softDeletes();

            $table->foreignId('product_id')->constrained('products');
            $table->foreignId('user_include_id')->nullable()->constrained('users');
            $table->foreignId('user_edition_id')->nullable()->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_specifications');
    }
};
