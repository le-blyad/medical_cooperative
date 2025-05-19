<?php
require_once '../../includes/header.php';
require_once '../../includes/config.php';

$sql = "SELECT n.*, m.name as medicine
        FROM name_of_the_medicine n
        JOIN medicine m ON n.medicine = m.id
        ORDER BY n.id ASC";

$result = $conn->query($sql);
?>

<h2>Лекарства</h2>
<?php if ($result->num_rows > 0): ?>
    <table class="table">
        <thead>
            <tr>
            <th>Номер посещения</th>
            <th>Лекарство</th>
            <th>Дозировка</th>
            <th>Продолжительность курса</th>
                <th colspan="2">Действия</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
            <td><?= htmlspecialchars($row['visit']) ?></td>
            <td><?= htmlspecialchars($row['medicine']) ?></td>
            <td><?= htmlspecialchars($row['dosage']) ?></td>
            <td><?= htmlspecialchars($row['duration_of_admission']) ?></td>
                <td>
                    <a class="button_change-update" href="pages/medicine/medicine_update.php?id=<?= $row['id'] ?>">Изменить</a>
                </td>
                <td>
                    <a class="button_change-delete" href="pages/medicine/medicine_delete.php?id=<?= $row['id'] ?>" 
                    onclick="return confirm('Вы уверены, что хотите удалить?')">Удалить</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Нет данных о лекарствах.</p>
<?php endif;
<?php require_once '../../includes/footer.php'; ?>
