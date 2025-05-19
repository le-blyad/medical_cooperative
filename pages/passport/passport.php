<?php
require_once '../../includes/header.php';
require_once '../../includes/config.php';

$sql = "SELECT * FROM passport";
$result = $conn->query($sql);
?>

<h2>Паспорт</h2>
<a class="button_change-add" href="pages/passport/passport_insert.php">Добавить</a>

<?php if ($result->num_rows > 0): ?>

    <table class="table">
        <thead>
            <tr>
                <th>Серия</th>
                <th>Номер</th>
                <th>Место получения</th>
                <th colspan="2">Действия</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['series']) ?></td>
                <td><?= htmlspecialchars($row['number']) ?></td>
                <td><?= htmlspecialchars($row['issued_by_whom']) ?></td>
                <td>
                    <a class="button_change-update" href="pages/passport/passport_update.php?id=<?= $row['id'] ?>">Изменить</a>
                </td>
                <td>
                    <a class="button_change-delete" href="pages/passport/passport_delete.php?id=<?= $row['id'] ?>" 
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