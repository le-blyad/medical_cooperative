<?php
$host = "localhost";
$user = "kirill";
$password = "1234";
$database = "medical_cooperative";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}
?>