<?php
require_once '../../includes/config.php';

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM name_of_the_medicine WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: name_of_the_medicine.php");
    exit();
} else {
    echo "<p>Ошибка при удалении: " . $conn->error . "</p>";
}

$conn->close();
?>