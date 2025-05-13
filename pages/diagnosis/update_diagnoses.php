<?php
require_once '../../includes/config.php';

$result = $conn->query("SELECT id, string FROM diagnosis");
$updated = 0;

while ($row = $result->fetch_assoc()) {
    $newDiagnosis = $row['string'];
    $modified = false;

    if (mb_strlen($newDiagnosis) >= 2 && mb_substr($newDiagnosis, 1, 1) == 'е') {
        $newDiagnosis .= 'шис';
        $modified = true;
    }

    $last3 = mb_substr($newDiagnosis, -3);
    if (in_array($last3, ['уха', 'УХА'])) {
        $newDiagnosis = mb_substr($newDiagnosis, 0, -3) . 'ания';
        $modified = true;
    }

    if ($modified) {
        $stmt = $conn->prepare("UPDATE diagnosis SET string = ? WHERE id = ?");
        $stmt->bind_param("si", $newDiagnosis, $row['id']);
        $stmt->execute();
        $updated++;
    }
}

header("Location: diagnosis.php?updated={$updated}");
$conn->close();
?>