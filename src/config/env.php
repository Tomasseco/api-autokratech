<?php

function loadEnv($path)
{
    if (!file_exists($path)) {
        return;
    }
    $lines = file($path);

    foreach ($lines as $line) {
        $line = trim($line);
        if ($line == '' || substr($line, 0, 1) == '#') {
            continue;
        }
        $parts = explode('=', $line, 2);
        if (count($parts) < 2) {
            continue;
        }

        $key = trim($parts[0]);
        $value = trim($parts[1]);
        $_ENV[$key] = $value;
       putenv("$key=$value");
    }
}
function env($key, $default = null)
{
    if (isset($_ENV[$key]) && $_ENV[$key] !== '') {
        return $_ENV[$key];
    }
    $value = getenv($key);
    if ($value !== false && $value !== '') {
        return $value;
    }
    return $default;
}