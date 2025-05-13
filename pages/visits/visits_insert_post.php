<?php
require_once '../../includes/config.php';

$data = [
    'patient' => $_POST['patient'],
    'doctor' => $_POST['doctor'],
    'date_visit' => $_POST['date_visit'],
    'office_in_hospital' => !empty($_POST['office_in_hospital']) ? $_POST['office_in_hospital'] : null,
    'symptoms' => $_POST['symptoms'],
    'diagnosis' => $_POST['diagnosis'],
    'prescription' => $_POST['prescription']
];

$stmt = $conn->prepare("INSERT INTO visit 
    (patient, doctor, date_visit, office_in_hospital, symptoms, diagnosis, prescription)
    VALUES (?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("iissiii", 
    $data['patient'],
    $data['doctor'],
    $data['date_visit'],
    $data['office_in_hospital'],
    $data['symptoms'],
    $data['diagnosis'],
    $data['prescription']
);

if ($stmt->execute()) {
    header("Location: visits.php");
} else {
    echo "Ошибка: " . $conn->error;
}

$conn->close();
?>