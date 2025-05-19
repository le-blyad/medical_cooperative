<?php
require_once '../../includes/config.php';

$string = $_POST['string'];
$stmt = $conn->prepare("INSERT INTO specialization (string) VALUES (?)");
$stmt->bind_param("s", $string);

if ($stmt->execute()) {
    header("Location: specialization.php");
    exit();
} else {
    echo "<p>Ошибка при добавлении: " . $conn->error . "</p>";
}

$conn->close();
?>