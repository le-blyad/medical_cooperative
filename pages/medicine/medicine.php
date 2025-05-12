<?php
require_once '../../includes/header.php';
require_once '../../includes/config.php';

$sql = "SELECT * FROM `medicine`";

$result = $conn->query($sql);
?>

<h2>Лекарства</h2>
<table class="table">
    <thead>
        <tr>
            <th>Название</th>
            <th>Приложение</th>
            <th>Действие</th>
            <th>Эффект</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['application']) ?></td>
            <td><?= htmlspecialchars($row['action']) ?></td>
            <td><?= htmlspecialchars($row['effect']) ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php require_once '../../includes/footer.php'; ?>