<?php
require_once '../../includes/config.php';

$symptom = $_POST['symptom'];
$stmt = $conn->prepare("INSERT INTO symptoms_patients (symptom) VALUES (?)");
$stmt->bind_param("s", $symptom);

if ($stmt->execute()) {
    header("Location: symptoms_patients.php");
    exit();
} else {
    echo "<p>Ошибка при добавлении: " . $conn->error . "</p>";
}

$conn->close();
?>