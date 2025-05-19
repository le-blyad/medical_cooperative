<?php
require_once '../../includes/config.php';

$id = $_POST['id'];
$name = $_POST['name'];
$application = $_POST['application'];
$action = $_POST['action'];
$effect = $_POST['effect'];

$stmt = $conn->prepare("UPDATE medicine SET name = ?, application = ?, action = ?, effect = ? WHERE id = ?");
$stmt->bind_param("ssssi", $name, $application, $action, $effect, $id);

if ($stmt->execute()) {
    header("Location: medicine.php");
    exit();
} else {
    echo "<p>Ошибка при обновлении: " . $conn->error . "</p>";
}

$conn->close();
?>