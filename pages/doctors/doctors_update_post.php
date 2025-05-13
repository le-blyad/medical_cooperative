<?php
require_once '../../includes/config.php';

$id = $_POST['id'];
$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
$patronymic = $_POST['patronymic'];
$date_of_birth = $_POST['date_of_birth'];
$number_phone = $_POST['number_phone'];
$email = $_POST['email'];
$specialization = $_POST['specialization'];
$post = $_POST['post'];

$stmt = $conn->prepare("UPDATE doctor SET 
    last_name = ?, 
    first_name = ?, 
    patronymic = ?, 
    date_of_birth = ?, 
    number_phone = ?, 
    email = ?, 
    specialization = ?, 
    post = ? 
    WHERE id = ?");
    
$stmt->bind_param("ssssssiii", 
    $last_name, 
    $first_name, 
    $patronymic, 
    $date_of_birth, 
    $number_phone, 
    $email, 
    $specialization, 
    $post, 
    $id
);

if ($stmt->execute()) {
    header("Location: doctors.php");
    exit();
} else {
    echo "<p>Ошибка при обновлении: " . $conn->error . "</p>";
}

$conn->close();
?>