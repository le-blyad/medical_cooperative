<?php
require_once '../../includes/header.php';
require_once '../../includes/config.php';

$sql = "SELECT * FROM gender";
$result = $conn->query($sql);
?>

<h2>Список полов</h2>
<a class="button_change-add" href="pages/gender/gender_insert.php">Добавить</a>

<?php if ($result->num_rows > 0): ?>
    <table class="table">
        <thead>
            <tr>
                <th>Пол</th>
                <th colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['gen']) ?></td>
                <td> 
                    <a class="button_change-update" href="pages/gender/gender_update.php?id=<?= $row['id'] ?>">Изменить</a> 
                </td>
                <td>
                    <a class="button_change-delete" href="pages/gender/gender_delete.php?id=<?= $row['id'] ?>" 
                    onclick="return confirm('Вы уверены, что хотите удалить?')">Удалить</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Нет данных о полах.</p>
<?php endif;

$conn->close();
require_once '../../includes/footer.php';
?>