<?php

function loadEnv($path)
{
    // If the file does not exist, stop
    if (!file_exists($path)) {
        return;
    }

    // Read all lines from the .env file
    $lines = file($path);

    foreach ($lines as $line) {
        $line = trim($line);

        // Skip empty lines or comments (#)
        if ($line == '' || substr($line, 0, 1) == '#') {
            continue;
        }

        // Split into key=value (only the first "=")
        $parts = explode('=', $line, 2);

        // If it is not a valid key=value line, skip it
        if (count($parts) < 2) {
            continue;
        }

        $key = trim($parts[0]);
        $value = trim($parts[1]);

        // Save into environment variables
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