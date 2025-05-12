<?php
require_once '../../includes/header.php';
require_once '../../includes/config.php';

$sql = "SELECT b.type
        FROM blood_type b";

$result = $conn->query($sql);
?>

<h2>Перечень групп крови</h2>
<table class="table">
    <thead>
        <tr>
            <th>Группы крови</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['type']) ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php require_once '../../includes/footer.php'; ?>