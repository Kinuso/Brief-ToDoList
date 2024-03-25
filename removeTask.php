<?php
session_start();
header('Content-Type: application/json');
require_once __DIR__ . "/config.php";


$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
$conn = new PDO($dsn, DB_USER, DB_PWD);

$data = json_decode(file_get_contents('php://input'), true);
$taskId = $data['taskId'];

$sql = "DELETE FROM " . PREFIXE . "task WHERE ID_TASK = :ID_TASK";

$statement = $conn->prepare($sql);
$statement->execute([
    ':ID_TASK' => $taskId
]);

// Check if the deletion was successful
if ($statement->rowCount() > 0) {
    echo json_encode(['status' => 'success', 'message' => 'Tache supprimée de la base de données']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Aucune tache trouvée avec cet ID']);
}
