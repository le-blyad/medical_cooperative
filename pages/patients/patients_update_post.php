<?php
require_once '../../includes/config.php';

$id = $_POST['id'];
$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
$patronymic = $_POST['patronymic'];
$gender = $_POST['gender'];
$data_of_birth = $_POST['data_of_birth'];
$blood_type = $_POST['blood_type'];
$phone_number = $_POST['phone_number'];

$stmt = $conn->prepare("UPDATE patient 
    SET last_name = ?, first_name = ?, patronymic = ?, gender = ?, data_of_birth = ?, blood_type = ?, phone_number = ? 
    WHERE id = ?");
$stmt->bind_param("sssisssi", $last_name, $first_name, $patronymic, $gender, $data_of_birth, $blood_type, $phone_number, $id);

if ($stmt->execute()) {
    header("Location: patients.php");
    exit();
} else {
    echo "<p>Ошибка при обновлении: " . $conn->error . "</p>";
}

$conn->close();
?>
