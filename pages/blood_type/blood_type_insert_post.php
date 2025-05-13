<?php
require_once '../../includes/config.php';

$type = $_POST['type'];
$stmt = $conn->prepare("INSERT INTO blood_type (type) VALUES (?)");
$stmt->bind_param("s", $type);  // Было $title, исправлено на $type

if ($stmt->execute()) {
    header("Location: blood_type.php");
    exit();
} else {
    echo "<p>Ошибка при добавлении: " . $conn->error . "</p>";
}

$conn->close();
?>