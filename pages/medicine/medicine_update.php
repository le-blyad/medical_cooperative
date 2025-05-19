<?php
require_once '../../includes/header.php';
require_once '../../includes/config.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM medicine WHERE id = $id");
$row = $result->fetch_assoc();
?>

<a class="button_a" href="pages/medicine/medicine.php">Вернуться</a>

<div class="main-interaction_block">
    <div class="interaction_block">
        <h2>Редактирование лекарства</h2>
        <form name="form1" method="post" action="pages/medicine/medicine_update_post.php">
            <table>
                <tr>
                    <td><strong>ID:</strong></td>
                    <td><input name="id" type="text" value="<?= $row['id'] ?>" readonly></td>
                </tr>
                <tr>
                    <td><strong>Название:</strong></td>
                    <td><input name="name" type="text" value="<?= htmlspecialchars($row['name']) ?>" required></td>
                </tr>
                <tr>
                    <td><strong>Приложение:</strong></td>
                    <td><input name="application" type="text" value="<?= htmlspecialchars($row['application']) ?>" required></td>
                </tr>
                <tr>
                    <td><strong>Действие:</strong></td>
                    <td><input name="action" type="text" value="<?= htmlspecialchars($row['action']) ?>" required></td>
                </tr>
                <tr>
                    <td><strong>Эффект:</strong></td>
                    <td><input name="effect" type="text" value="<?= htmlspecialchars($row['effect']) ?>" required></td>
                </tr>
            </table>
            <input type="submit" name="submit" value="Сохранить" class="btn">
        </form>
    </div>
</div>

<?php
$conn->close();
require_once '../../includes/footer.php';
?>