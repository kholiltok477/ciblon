<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Schema;

if (Schema::hasTable('events')) {
    echo "Table 'events' already exists.\n";
} else {
    echo "Table 'events' does NOT exist.\n";
}
