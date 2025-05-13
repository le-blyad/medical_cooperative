<?php
require_once '../../includes/config.php';

$id = $_POST['id'];
$string = $_POST['string'];
$stmt = $conn->prepare("UPDATE diagnosis SET string = ? WHERE id = ?");
$stmt->bind_param("si", $string, $id);

if ($stmt->execute()) {
    header("Location: diagnosis.php");
    exit();
} else {
    echo "<p>Ошибка при обновлении диагноза: " . $conn->error . "</p>";
}

$conn->close();
?>