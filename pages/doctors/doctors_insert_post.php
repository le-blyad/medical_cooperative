<?php
require_once '../../includes/config.php';

$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
$patronymic = $_POST['patronymic'];
$date_of_birth = $_POST['date_of_birth'];
$number_phone = $_POST['number_phone'];
$email = $_POST['email'];
$specialization = $_POST['specialization'];
$post = $_POST['post'];

$stmt = $conn->prepare("INSERT INTO doctor 
    (last_name, first_name, patronymic, date_of_birth, number_phone, email, specialization, post) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssii", $last_name, $first_name, $patronymic, $date_of_birth, $number_phone, $email, $specialization, $post);

if ($stmt->execute()) {
    header("Location: doctors.php");
    exit();
} else {
    echo "<p>Ошибка при добавлении: " . $conn->error . "</p>";
}

$conn->close();
?>