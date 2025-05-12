<?php
require_once '../../includes/header.php';
require_once '../../includes/config.php';

$sql = "SELECT s.symptom
        FROM symptoms_patients s";

$result = $conn->query($sql);
?>

<table class="table">
    <thead>
        <tr>
            <th>Симпотомы</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['symptom']) ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php require_once '../../includes/footer.php'; ?>