<?php
require_once '../../includes/config.php';

$id = $_POST['id'];
$series = $_POST['series'];
$number = $_POST['number'];
$issued_by_whom = $_POST['issued_by_whom'];

$stmt = $conn->prepare("UPDATE passport 
    SET series = ?, number = ?, issued_by_whom = ?
    WHERE id = ?");
$stmt->bind_param("iisi", $series, $number, $issued_by_whom, $id);

if ($stmt->execute()) {
    header("Location: passport.php");
    exit();
} else {
    echo "<p>Ошибка при обновлении: " . $conn->error . "</p>";
}

$conn->close();
?>