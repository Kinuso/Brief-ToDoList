<?php

header('Content-Type: application/json');
require_once __DIR__ . "/config.php";

// Contact the databae
$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
$conn = new PDO($dsn, DB_USER, DB_PWD);

// Get the Json sent from the script and store the value into variable
$data = json_decode(file_get_contents('php://input'), true);
$email = $data['email'];
$password = $data['password'];

// Prepare and execute the SQL query to retrieve the hashed password for the given email
$sql = "SELECT * FROM `tdl_user` WHERE EMAIL = :EMAIL";

$statement = $conn->prepare($sql);
$statement->execute([':EMAIL' => $email]);
$result = $statement->fetch(PDO::FETCH_ASSOC);


if ($result) {
    $hashedPassword = $result["PASSWORD"];
    $userId = $result["ID_USER"]; // Fetch the user ID
    // Verify the password  
    if (password_verify($password, $hashedPassword)) {
        // Password is correct, proceed with the login process
        session_start();
        $_SESSION["userId"] = $userId;
        echo json_encode(['status' => 'success', 'message' => 'it works c incroyable', 'userId' => $userId]);
    } else {
        // Password is incorrect
        echo json_encode(['status' => 'error', 'message' => 'incorrect password']);
    }
} else {
    // No user found with that email
    echo json_encode(['status' => 'error', 'message' => 'No user found with that email']);
}