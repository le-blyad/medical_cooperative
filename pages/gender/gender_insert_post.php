<?php
require_once '../../includes/config.php';

$gen = $_POST['gen'];
$stmt = $conn->prepare("INSERT INTO gender (gen) VALUES (?)");
$stmt->bind_param("s", $gen);

if ($stmt->execute()) {
    header("Location: gender.php");
    exit();
} else {
    echo "<p>Ошибка при добавлении: " . $conn->error . "</p>";
}

$conn->close();
?>