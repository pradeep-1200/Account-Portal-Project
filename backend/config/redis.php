<?php


if (!class_exists('Redis')) {
    header("Content-Type: application/json");
    echo json_encode(["status" => "error", "message" => "Redis extension not installed/enabled in php.ini"]);
    exit;
}

try {
    $redis = new Redis();
    // Suppress warnings for connection issues to catch them as exceptions or check return value
    if (!@$redis->connect("127.0.0.1", 6379)) {
        throw new Exception("Could not connect to Redis server at 127.0.0.1:6379");
    }
} catch (Exception $e) {
    header("Content-Type: application/json");
    echo json_encode(["status" => "error", "message" => "Redis Connection Error: " . $e->getMessage()]);
    exit;
}

