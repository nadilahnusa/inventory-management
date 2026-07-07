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
        Schema::create('borrowings', function (Blueprint $table) {

            $table->id();

            $table->string('borrowing_code', 30)->unique();

            // Petugas gudang yang menginput transaksi
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            // Department peminjam
            $table->foreignId('department_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            // Barang yang dipinjam
            $table->foreignId('product_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            // Nama peminjam
            $table->string('borrower_name', 100);

            // Jumlah barang dipinjam
            $table->unsignedInteger('quantity')->default(1);

            // Tujuan peminjaman
            $table->string('purpose');

            // Tanggal pinjam & kembali
            $table->date('borrow_date');
            $table->date('return_date');
            $table->date('actual_return_date')->nullable();

            // Status
            $table->enum('status', [
                'Borrowed',
                'Returned',
                'Overdue',
            ])->default('Borrowed');

            // Catatan tambahan
            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowings');
    }
};