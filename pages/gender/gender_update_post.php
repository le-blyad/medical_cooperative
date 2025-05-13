<?php
require_once '../../includes/config.php';

$id = $_POST['id'];
$gen = $_POST['gen'];
$stmt = $conn->prepare("UPDATE gender SET gen = ? WHERE id = ?");
$stmt->bind_param("si", $gen, $id);

if ($stmt->execute()) {
    header("Location: gender.php");
    exit();
} else {
    echo "<p>Ошибка при обновлении: " . $conn->error . "</p>";
}

$conn->close();
?>