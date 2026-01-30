<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "guvi_internship";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    header("Content-Type: application/json");
    echo json_encode(["status" => "error", "message" => "MySQL Connection Failed: " . $conn->connect_error]);
    exit;
}
