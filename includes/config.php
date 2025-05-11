<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "medical_cooperative";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}
?>