<?php
require_once '../../includes/config.php';

$id = $_POST['id'];
$patient = $_POST['patient'];
$doctor = $_POST['doctor'];
$date_visit = $_POST['date_visit'];
$office = $_POST['office_in_hospital'];
$symptoms = $_POST['symptoms'];
$diagnosis = $_POST['diagnosis'];
$prescription = $_POST['prescription'];

$date_visit = date('Y-m-d H:i:s', strtotime($date_visit));

$stmt = $conn->prepare("UPDATE visit 
    SET patient = ?, doctor = ?, date_visit = ?, office_in_hospital = ?, 
    symptoms = ?, diagnosis = ?, prescription = ? 
    WHERE id = ?");
$stmt->bind_param("iissiiii", $patient, $doctor, $date_visit, $office, $symptoms, $diagnosis, $prescription, $id);

if ($stmt->execute()) {
    header("Location: visits.php");
    exit();
} else {
    echo "<p>Ошибка при обновлении: " . $conn->error . "</p>";
}

$conn->close();
?>