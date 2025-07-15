<?php
function env(string $key, mixed $default = null): mixed {
    $val = $_ENV[$key] ?? getenv($key);
    if ($val === false) return $default;

    return match (strtolower($val)) {
        'true' => true,
        'false' => false,
        'null' => null,
        default => $val,
    };
}
