<?php
require_once '../../includes/config.php';

$name = $_POST['name'];
$application = $_POST['application'];
$action = $_POST['action'];
$effect = $_POST['effect'];

$stmt = $conn->prepare("INSERT INTO medicine (name, application, action, effect) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $application, $action, $effect);

if ($stmt->execute()) {
    header("Location: medicine.php");
    exit();
} else {
    echo "<p>Ошибка при добавлении: " . $conn->error . "</p>";
}

$conn->close();
?>