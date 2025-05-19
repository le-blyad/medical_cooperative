<?php
require_once '../../includes/config.php';

$visit = $_POST['visit'];
$medicine = $_POST['medicine'];
$dosage = $_POST['dosage'];
$duration_of_admission = $_POST['duration_of_admission'];

$stmt = $conn->prepare("INSERT INTO name_of_the_medicine (visit, medicine, dosage, duration_of_admission) VALUES (?, ?, ?, ?)");
$stmt->bind_param("iiss", $visit, $medicine, $dosage, $duration_of_admission);

if ($stmt->execute()) {
    header("Location: name_of_the_medicine.php");
    exit();
} else {
    echo "<p>Ошибка при добавлении: " . $conn->error . "</p>";
}

$conn->close();
?>