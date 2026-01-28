<?php
header("Content-Type: application/json");

require_once "config/mysql.php";

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $conn->prepare(
    "SELECT id, password FROM users WHERE email = ?"
);
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 1) {

    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        echo json_encode([
            "status" => "success",
            "message" => "Login successful",
            "user_id" => $user['id']
        ]);
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Invalid credentials"
        ]);
    }

} else {
    echo json_encode([
        "status" => "error",
        "message" => "User not found"
    ]);
}
