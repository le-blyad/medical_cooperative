<?php
require_once '../../includes/config.php';

$data = [
    'series' => $_POST['series'],
    'number' => $_POST['number'],
    'issued_by_whom' => $_POST['issued_by_whom']
];

$stmt = $conn->prepare("INSERT INTO passport 
    (series, number, issued_by_whom)
    VALUES (?, ?, ?)");

$stmt->bind_param("iis", 
    $data['series'],
    $data['number'],
    $data['issued_by_whom']
);

if ($stmt->execute()) {
    header("Location: passport.php");
} else {
    echo "Ошибка: " . $conn->error;
}

$conn->close();
?>