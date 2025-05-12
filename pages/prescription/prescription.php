<?php
require_once '../../includes/header.php';
require_once '../../includes/config.php';

$sql = "SELECT p.name_prescription
        FROM prescription p";

$result = $conn->query($sql);
?>

<table class="table">
    <thead>
        <tr>
            <th>Предписание</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['name_prescription']) ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php require_once '../../includes/footer.php'; ?>