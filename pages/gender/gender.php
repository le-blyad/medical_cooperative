<?php
require_once '../../includes/header.php';
require_once '../../includes/config.php';

$sql = "SELECT g.gen
        FROM gender g";

$result = $conn->query($sql);
?>

<table class="table">
    <thead>
        <tr>
            <th>Пол</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['gen']) ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php require_once '../../includes/footer.php'; ?>