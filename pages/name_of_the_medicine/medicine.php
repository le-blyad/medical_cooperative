<?php
require_once '../../includes/header.php';
require_once '../../includes/config.php';

$sql = "SELECT * FROM medicine";
$result = $conn->query($sql);
?>

<h2>Лекарства</h2>
<a class="button_change-add" href="pages/medicine/medicine_insert.php">Добавить</a>

<?php if ($result->num_rows > 0): ?>
    <table class="table">
        <thead>
            <tr>
                <th>Название</th>
                <th>Приложение</th>
                <th>Действие</th>
                <th>Эффект</th>
                <th colspan="2">Действия</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['application']) ?></td>
                <td><?= htmlspecialchars($row['action']) ?></td>
                <td><?= htmlspecialchars($row['effect']) ?></td>
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

$conn->close();
require_once '../../includes/footer.php';
?>