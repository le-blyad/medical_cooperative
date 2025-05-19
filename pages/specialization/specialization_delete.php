<?php
require_once '../../includes/config.php';

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM specialization WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: specialization.php");
    exit();
} else {
    echo "<p>Ошибка при удалении: " . $conn->error . "</p>";
}

$conn->close();
?>