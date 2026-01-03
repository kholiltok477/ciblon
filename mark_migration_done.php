<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

$migrationName = '2025_12_20_123846_create_events_table';
$exists = DB::table('migrations')->where('migration', $migrationName)->exists();

if (!$exists) {
    DB::table('migrations')->insert([
        'migration' => $migrationName,
        'batch' => DB::table('migrations')->max('batch') + 1
    ]);
    echo "Migration '$migrationName' marked as finished.\n";
} else {
    echo "Migration '$migrationName' was already marked as finished.\n";
}
