<?php
require_once '../../includes/config.php';

$id = $_POST['id'];
$string = $_POST['string'];
$stmt = $conn->prepare("UPDATE post SET string = ? WHERE id = ?");
$stmt->bind_param("si", $string, $id);

if ($stmt->execute()) {
    header("Location: post.php");
    exit();
} else {
    echo "<p>Ошибка при обновлении: " . $conn->error . "</p>";
}

$conn->close();
?>