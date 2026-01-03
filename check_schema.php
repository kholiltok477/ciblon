<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Schema;

$table = 'events';
$columns = Schema::getColumnListing($table);
foreach ($columns as $column) {
    $type = Schema::getColumnType($table, $column);
    echo "$column ($type)\n";
}
echo "\n--- News Table Check ---\n";
echo Schema::hasTable('news') ? 'news table exists' : 'news table missing';
echo "\n";
