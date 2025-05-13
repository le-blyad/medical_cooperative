<?php
require_once '../../includes/config.php';

$name_prescription = $_POST['name_prescription'];
$stmt = $conn->prepare("INSERT INTO prescription (name_prescription) VALUES (?)");
$stmt->bind_param("s", $name_prescription);

if ($stmt->execute()) {
    header("Location: prescription.php");
    exit();
} else {
    echo "<p>Ошибка при добавлении: " . $conn->error . "</p>";
}

$conn->close();
?>