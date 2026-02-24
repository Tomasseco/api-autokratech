<?php
header('Content-Type: application/json; charset-utf-8');

require __DIR__ . '/src/config/env.php';
require __DIR__ . '/src/config/database.php';
require __DIR__ . '/src/Errors/ErrorCatalog.php';
require __DIR__ . '/src/router.php'; 