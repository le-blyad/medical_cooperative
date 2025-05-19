<?php
require_once '../../includes/config.php';

$id = $_POST['id'];
$visit = $_POST['visit'];
$medicine = $_POST['medicine'];
$dosage = $_POST['dosage'];
$duration_of_admission = $_POST['duration_of_admission'];

$stmt = $conn->prepare("UPDATE name_of_the_medicine SET visit = ?, medicine = ?, dosage = ?, duration_of_admission = ? WHERE id = ?");
$stmt->bind_param("iissi", $visit, $medicine, $dosage, $duration_of_admission, $id);

if ($stmt->execute()) {
    header("Location: name_of_the_medicine.php");
    exit();
} else {
    echo "<p>Ошибка при обновлении: " . $conn->error . "</p>";
}

$conn->close();
?>