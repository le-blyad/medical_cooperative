<?php
require_once '../../includes/header.php';
require_once '../../includes/config.php';

$sql = "SELECT * FROM passport";

$result = $conn->query($sql);
?>

<h2>Паспорт</h2>
<table class="table">
    <thead>
        <tr>
            <th>Серия</th>
            <th>Номер</th>
            <th>Место получения</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['series']) ?></td>
            <td><?= htmlspecialchars($row['number']) ?></td>
            <td><?= htmlspecialchars($row['issued_by_whom']) ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php require_once '../../includes/footer.php'; ?>
