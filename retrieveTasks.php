<?php
session_start();

header('Content-Type: application/json');
require_once __DIR__ . "/config.php";

$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
$conn = new PDO($dsn, DB_USER, DB_PWD);

$userId = $_SESSION["userId"];

$sql = "SELECT t.*, c.NAME as CATEGORY_NAME, p.NAME as PRIORITY_NAME
        FROM `tdl_task` t
        JOIN `tdl_category` c ON t.ID_CATEGORY = c.ID_CATEGORY
        JOIN `tdl_priority` p ON t.ID_PRIORITY = p.ID_PRIORITY
        WHERE t.ID_USER = :ID_USER";

$statement = $conn->prepare($sql);
$statement->execute([':ID_USER' => $userId]);
$tasks = $statement->fetchAll(PDO::FETCH_ASSOC);

// Send the tasks as a JSON response
echo json_encode($tasks);
