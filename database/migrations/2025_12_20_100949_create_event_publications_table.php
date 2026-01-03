<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('event_publications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('package_name'); // e.g. Mingguan, Bulanan
            $table->decimal('package_price', 10, 2);
            $table->string('organizer_name');
            $table->text('organizer_address');
            $table->text('organizer_description');
            $table->string('instagram');
            $table->string('website')->nullable();
            $table->string('logo_path')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_publications');
    }
};
