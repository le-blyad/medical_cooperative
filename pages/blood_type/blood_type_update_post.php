<?php
require_once '../../includes/config.php';

$id = $_POST['id'];
$type = $_POST['type'];
$stmt = $conn->prepare("UPDATE blood_type SET type = ? WHERE id = ?");
$stmt->bind_param("si", $type, $id);

if ($stmt->execute()) {
    header("Location: blood_type.php");
    exit();
} else {
    echo "<p>Ошибка при обновлении корпуса: " . $conn->error . "</p>";
}

$conn->close();
?>