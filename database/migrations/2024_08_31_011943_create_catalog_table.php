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
        Schema::create('book_author', function (Blueprint $table) {
            $table->id();
            $table->string('name', 63);
            $table->timestamps();
        });
        Schema::create('book_publisher', function (Blueprint $table) {
            $table->id();
            $table->string('name', 63);
            $table->timestamps();
        });
        Schema::create('category', function (Blueprint $table) {
            $table->id();
            $table->string('name', 31);
            $table->timestamps();
        });
        Schema::create('service', function (Blueprint $table) {
            $table->id();
            $table->string('name', 31);
            $table->timestamps();
        });
        Schema::create('catalog', function (Blueprint $table) {
            $table->id();
            $table->string('title', 127);
            $table->string('description', 255)->nullable();
            $table->string('cover', 255)->nullable();
            $table->foreignId('author_id')->constrained('book_author');
            $table->foreignId('publisher_id')->constrained('book_publisher');
            $table->foreignId('category_id')->constrained('category');
            $table->foreignId('service_id')->nullable()->constrained('service');
            $table->string('external_id', 255)->nullable();
            $table->string('link', 255)->nullable();
            $table->foreignId('owner_id')->nullable()->constrained('user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalog');
        Schema::dropIfExists('service');
        Schema::dropIfExists('category');
        Schema::dropIfExists('book_publisher');
        Schema::dropIfExists('book_author');
    }
};
