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
            $table->string('name', 300)->unique();
            $table->double('price', 9, 2);
            $table->tinyInteger('status')->default(1);
            $table->text('description', 300)->nullable();
            $table->text('image', 300)->nullable();
            $table->string('link', 300)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreignId('user_include_id')->nullable()->constrained('users');
            $table->foreignId('user_edition_id')->nullable()->constrained('users');
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
