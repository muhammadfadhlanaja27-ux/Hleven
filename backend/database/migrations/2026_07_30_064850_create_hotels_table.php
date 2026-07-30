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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')
                ->constrained('users')
                ->onDelete('cascade');
            $table->string('name');
            $table->text('address');
            $table->string('city')->index();
            $table->text('description')->nullable();
            $table->decimal('rating', 3, 2)->default(0.00);
            $table->enum('verification_status', ['pending', 'approved', 'rejected'])
                ->default('pending');
            $table->json('facility')->nullable();
            $table->string('foto_hotel')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};