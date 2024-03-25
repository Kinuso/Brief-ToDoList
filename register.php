<?php

header('Content-Type: application/json');
require_once __DIR__ . "/config.php";
//*Connexion a la BDD
$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
$conn = new PDO($dsn, DB_USER, DB_PWD);

//* Récupération des infos
$data = json_decode(file_get_contents('php://input'), true);
var_dump($data);
$firstName = htmlspecialchars($data['firstName']);
$lastName = htmlspecialchars($data['lastName']);
$password = password_hash($data['password'], PASSWORD_DEFAULT);
$email = $data['email'];

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $email = htmlspecialchars($email);
}



$sqlChecking = "SELECT * FROM `tdl_user` WHERE EMAIL = :email";
$statement = $conn->prepare($sqlChecking);
$retour = $statement->execute([
    ':email' => $email,
]);
$result = $statement->fetch(PDO::FETCH_ASSOC);


if (!$result) {
    // * Insertion dans la BDD
    $sql = "INSERT INTO " . PREFIXE . "user (ID_USER, FIRSTNAME, LASTNAME, PASSWORD, EMAIL) VALUES (:id ,:firstName, :lastName, :password, :email)";
    $statement = $conn->prepare($sql);
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    $retour = $statement->execute([
        ':id' => null,
        ':firstName' => $firstName,
        ':lastName' => $lastName,
        ':password' => $password,
        ':email' => $email,
    ]);
    echo json_encode(['status' => 'success', 'message' => 'Inscription Reussie']);
} else {
    echo json_encode(["status' => 'error', 'message' => 'Un utilisateur utilise deja l'email"]);
}
