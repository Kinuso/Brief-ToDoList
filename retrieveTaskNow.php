<?php
session_start();

header('Content-Type: application/json');
require_once __DIR__ . "/config.php";

$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
$conn = new PDO($dsn, DB_USER, DB_PWD);

$sql = "SELECT t.*, c.NAME as CATEGORY_NAME, p.NAME as PRIORITY_NAME
        FROM (
            SELECT * FROM tdl_task ORDER BY ID_TASK DESC LIMIT 1
        ) t
        JOIN tdl_category c ON t.ID_CATEGORY = c.ID_CATEGORY
        JOIN tdl_priority p ON t.ID_PRIORITY = p.ID_PRIORITY;";

$statement = $conn->prepare($sql);
$statement->execute();
$task = $statement->fetchAll(PDO::FETCH_ASSOC);

// Send the task as a JSON response
echo json_encode($task);
