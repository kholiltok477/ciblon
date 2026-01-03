<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

try {
    echo "Updating status column in event_publications table...\n";
    // Using raw SQL to be safe across different DB states
    DB::statement("ALTER TABLE event_publications MODIFY COLUMN status ENUM('pending', 'approved', 'rejected', 'pending_payment') DEFAULT 'pending'");
    echo "Successfully updated status column.\n";
} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}
