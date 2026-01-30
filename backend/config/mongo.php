<?php

require_once __DIR__ . '/../vendor/autoload.php';

try {
    // Local MongoDB Connection
    $client = new MongoDB\Client("mongodb://127.0.0.1:27017");
    $db = $client->account_portal;
    $profiles = $db->profiles;
} catch (Exception $e) {
    // Return JSON error if connection fails immediately
    header("Content-Type: application/json");
    echo json_encode(["status" => "error", "message" => "MongoDB Connection Error: " . $e->getMessage()]);
    exit;
}
