<?php
require_once '../../includes/config.php';

$id = $_POST['id'];
$name_prescription = $_POST['name_prescription'];
$stmt = $conn->prepare("UPDATE prescription SET name_prescription = ? WHERE id = ?");
$stmt->bind_param("si", $name_prescription, $id);

if ($stmt->execute()) {
    header("Location: prescription.php");
    exit();
} else {
    echo "<p>Ошибка при обновлении: " . $conn->error . "</p>";
}

$conn->close();
?>