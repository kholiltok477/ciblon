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
        Schema::table('event_publications', function (Blueprint $table) {
            $table->json('registration_periods')->nullable()->after('status');
            $table->string('payment_type')->nullable()->after('registration_periods'); // Gratis / Bayar
            $table->string('category')->nullable()->after('payment_type');
            $table->string('target_audience')->nullable()->after('category');
            $table->string('activity_type')->nullable()->after('target_audience'); // Online / Offline
            $table->string('activity_level')->nullable()->after('activity_type');
            $table->string('registration_link')->nullable()->after('activity_level');
            $table->string('guidebook_link')->nullable()->after('registration_link');
            $table->string('whatsapp_number')->nullable()->after('guidebook_link');
            $table->string('poster_path')->nullable()->after('whatsapp_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('event_publications', function (Blueprint $table) {
            $table->dropColumn([
                'registration_periods',
                'payment_type',
                'category',
                'target_audience',
                'activity_type',
                'activity_level',
                'registration_link',
                'guidebook_link',
                'whatsapp_number',
                'poster_path'
            ]);
        });
    }
};
