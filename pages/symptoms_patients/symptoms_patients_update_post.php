<?php
require_once '../../includes/config.php';

$id = $_POST['id'];
$symptom = $_POST['symptom'];
$stmt = $conn->prepare("UPDATE symptoms_patients SET symptom = ? WHERE id = ?");
$stmt->bind_param("si", $symptom, $id);

if ($stmt->execute()) {
    header("Location: symptoms_patients.php");
    exit();
} else {
    echo "<p>Ошибка при обновлении: " . $conn->error . "</p>";
}

$conn->close();
?>