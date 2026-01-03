<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

try {
    if (!Schema::hasTable('news')) {
        echo "Creating news table...\n";
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable();
            $table->longText('content');
            $table->string('image')->nullable();
            $table->foreignId('author_id')->constrained('users')->onDelete('cascade');
            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
        echo "News table created.\n";
    }

    if (!Schema::hasTable('settings')) {
        echo "Creating settings table...\n";
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->string('type')->default('text');
            $table->string('group')->default('general');
            $table->timestamps();
        });
        echo "Settings table created.\n";

        // Seed initial settings
        DB::table('settings')->insert([
            ['key' => 'hero_title', 'value' => 'Raih Prestasimu di Ciblón Wonosobo', 'type' => 'text', 'group' => 'hero'],
            ['key' => 'hero_subtitle', 'value' => 'Ajang kompetisi renang pelajar terbesar se-Wonosobo. Tunjukkan bakatmu, pecahkan rekor, dan jadilah juara masa depan.', 'type' => 'text', 'group' => 'hero'],
            ['key' => 'hero_image', 'value' => 'https://images.unsplash.com/photo-1530541930197-ff16ac917b0e?auto=format&fit=crop&q=80', 'type' => 'image', 'group' => 'hero'],
            ['key' => 'stat_peserta', 'value' => '500+', 'type' => 'text', 'group' => 'stats'],
            ['key' => 'stat_sekolah', 'value' => '25', 'type' => 'text', 'group' => 'stats'],
            ['key' => 'stat_nomor_lomba', 'value' => '50', 'type' => 'text', 'group' => 'stats'],
            ['key' => 'stat_total_hadiah', 'value' => '10Jt+', 'type' => 'text', 'group' => 'stats'],
        ]);
    }

} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}
