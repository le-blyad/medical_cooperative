<?php
require_once '../../includes/header.php';
require_once '../../includes/config.php';

$sql = "SELECT * FROM blood_type";

$result = $conn->query($sql);
?>

<h2>Перечень групп крови</h2>
<a class="button_change-add" href="pages/blood_type/blood_type_insert.php">Добавить</a>

    <?php if ($result->num_rows > 0): ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Группы крови</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td> <?= htmlspecialchars($row['type']) ?> </td>
                    <td> 
                        <a class="button_change-update" href="pages/blood_type/blood_type_update.php?id=<?= $row['id'] ?>">Изменить</a> 
                    </td>
                    <td>
                        <a class="button_change-delete" href="pages/blood_type/blood_type_delete.php?id=<?= $row['id'] ?>" 
                        onclick="return confirm('Вы уверены, что хотите удалить?')">Удалить</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

    <?php else: ?>
        <p>Нет данных о корпусах.</p>
    <?php endif;

$conn->close();
require_once '../../includes/footer.php';
?>
