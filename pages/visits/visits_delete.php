<?php
require_once '../../includes/config.php';

$visit_id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM visit WHERE id = ?");
$stmt->bind_param("i", $visit_id);

if ($stmt->execute()) {
    header("Location: visits.php");
} else {
    echo "Ошибка при удалении: " . $conn->error;
}

$conn->close();
?>