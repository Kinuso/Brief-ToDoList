<?php
require __DIR__ . "/../config.php";

// Check if the request is for registration or login


} if ($type === 'login') {
    // Login logic
    $email = $_POST['email'];
    $password = $_POST['password'];

    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
    $conn = new PDO($dsn, DB_USER, DB_PWD);

    $sql2 = "SELECT PASSWORD FROM `tdl_user` WHERE EMAIL = :EMAIL";
    $statement2 = $conn->prepare($sql2);
    $retour2 = $statement2->execute([
        ':EMAIL' => $email
    ]);

    $result = $statement2->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        $hashedPassword = $result["PASSWORD"];
        if (password_verify($password, $hashedPassword)) {
            echo "Login successful";
        } else {
            echo "Invalid password";
        }
    } else {
        echo "No user found with that email";
    }
} else {
    echo "Invalid request type";
}
