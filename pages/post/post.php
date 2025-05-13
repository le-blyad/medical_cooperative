<?php
require_once '../../includes/header.php';
require_once '../../includes/config.php';

$sql = "SELECT * FROM post";
$result = $conn->query($sql);
?>

<h2>Список должностей</h2>
<a class="button_change-add" href="pages/post/post_insert.php">Добавить</a>

<?php if ($result->num_rows > 0): ?>
    <table class="table">
        <thead>
            <tr>
                <th>Должность</th>
                <th colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['string']) ?></td>
                <td> 
                    <a class="button_change-update" href="pages/post/post_update.php?id=<?= $row['id'] ?>">Изменить</a> 
                </td>
                <td>
                    <a class="button_change-delete" href="pages/post/post_delete.php?id=<?= $row['id'] ?>" 
                    onclick="return confirm('Вы уверены, что хотите удалить?')">Удалить</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Нет данных о должностях.</p>
<?php endif;

$conn->close();
require_once '../../includes/footer.php';
?>