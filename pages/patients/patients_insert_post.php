<?php
require_once '../../includes/config.php';

$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
$patronymic = $_POST['patronymic'];
$gender = $_POST['gender'];
$data_of_birth = $_POST['data_of_birth'];
$blood_type = $_POST['blood_type'];
$phone_number = $_POST['phone_number'];

$stmt = $conn->prepare("INSERT INTO patient (last_name, first_name, patronymic, gender, data_of_birth, blood_type, phone_number) 
                        VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssisis", $last_name, $first_name, $patronymic, $gender, $data_of_birth, $blood_type, $phone_number);

if ($stmt->execute()) {
    header("Location: patients.php");
    exit();
} else {
    echo "<p>Ошибка при добавлении: " . $conn->error . "</p>";
}

$conn->close();
?>
