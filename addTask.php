<?php
session_start();
header('Content-Type: application/json');
require_once __DIR__ . "/config.php";

// Contact the database
$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
$conn = new PDO($dsn, DB_USER, DB_PWD);

// Get the Json sent from the script and store the value into variable
$data = json_decode(file_get_contents('php://input'), true);
$taskName = $data['taskName'];
$taskDescription = $data['taskDescription'];
$taskPriority = $data['taskPriority'];
$taskCategory = $data['taskCategory'];
$dueDate = $data['dueDate'];
$userId = $data['userId'];

// Prepare and execute the SQL query to retrieve the hashed password for the given email
$sql = "INSERT INTO " . PREFIXE . "task 
(ID_TASK,
NAME, 
DESCRIPTION, 
DUE_DATE, 
ID_CATEGORY, 
ID_PRIORITY, 
ID_USER) 

VALUES 

(:ID_TASK,
:taskName, 
:taskDescription, 
:DUE_DATE, 
:taskCategory, 
:taskPriority, 
:ID_USER)";

$statement = $conn->prepare($sql);
$statement->execute([
    ':ID_TASK' => null,
    ':taskName' => $taskName,
    ':taskDescription' => $taskDescription,
    ':taskPriority' => $taskPriority,
    ':taskCategory' => $taskCategory,
    ':DUE_DATE' => $dueDate,
    ':ID_USER' => $userId
]);
$result = $statement->fetch(PDO::FETCH_ASSOC);


if (!$result) {
    echo json_encode(['status' => 'success', 'message' => 'Tache ajoutée a la base de données']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'IT WORKS DE RIEN DU TOUT']);
}
