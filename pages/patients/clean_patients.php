<?php
require_once '../../includes/config.php';

$sql = "DELETE FROM patient 
        WHERE id NOT IN (SELECT patient FROM visit)";

if ($conn->query($sql)) {
    header("Location: patients.php?success=1");
} else {
    header("Location: patients.php?error=" . urlencode($conn->error));
}

$conn->close();
?>