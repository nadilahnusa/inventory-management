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

            $table->foreignId('category_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->string('code', 30)->unique();

            $table->string('serial_number', 100)
                ->nullable()
                ->unique();

            $table->string('name', 100);

            $table->text('description')->nullable();

            $table->unsignedInteger('total_stock');

            $table->unsignedInteger('available_stock');

            $table->string('location', 100);

            $table->enum('condition', [
                'Good',
                'Minor Damage',
                'Damaged',
                'Maintenance',
                'Lost'
            ])->default('Good');

            $table->enum('status', [
                'Available',
                'Borrowed',
                'Maintenance',
                'Disposed'
            ])->default('Available');

            $table->string('image')->nullable();

            $table->timestamps();
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