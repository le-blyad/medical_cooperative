<?php
require_once '../../includes/header.php';
require_once '../../includes/config.php';

$sql = "SELECT d.string
        FROM diagnosis d";

$result = $conn->query($sql);
?>

<h2>Список диагнозов</h2>
<table class="table">
    <thead>
        <tr>
            <th>Диагноз</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['string']) ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php require_once '../../includes/footer.php'; ?>