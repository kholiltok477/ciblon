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
       Schema::create('participants', function (Blueprint $table) {
    $table->id();
    $table->string('full_name');
    $table->string('email')->nullable();
    $table->string('phone')->nullable();
    $table->date('birth_date')->nullable();
    $table->unsignedBigInteger('category_id')->nullable();
    $table->string('photo_path')->nullable();
    $table->string('payment_proof_path')->nullable();
    $table->enum('status', ['pending','verified','rejected'])->default('pending');
    $table->text('notes')->nullable();
    $table->timestamps();

    $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};
