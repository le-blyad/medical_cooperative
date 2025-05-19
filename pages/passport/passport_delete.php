<?php
require_once '../../includes/config.php';

$passport_id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM passport WHERE id = ?");
$stmt->bind_param("i", $passport_id);

if ($stmt->execute()) {
    header("Location: passport.php");
} else {
    echo "Ошибка при удалении: " . $conn->error;
}

$conn->close();
?>