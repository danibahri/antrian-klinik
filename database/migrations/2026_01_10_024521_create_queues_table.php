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
        Schema::create('queues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('doctor_id')->constrained('doctors')->onDelete('cascade');
            $table->date('visit_date');
            $table->integer('queue_number');
            $table->text('complaint');
            $table->enum('status', ['WAITING', 'CALLED', 'DONE', 'CANCELED'])->default('WAITING');
            $table->timestamp('called_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamp('canceled_at')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();

            // Index untuk performa query
            $table->index(['doctor_id', 'visit_date', 'status']);
            $table->index(['user_id', 'status']);

            // Unique constraint: user tidak bisa daftar 2x ke dokter sama di tanggal sama
            // $table->unique(['user_id', 'doctor_id', 'visit_date'], 'unique_user_doctor_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('queues');
    }
};
