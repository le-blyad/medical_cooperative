<?php
require_once '../../includes/header.php';
require_once '../../includes/config.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM specialization WHERE id = $id");
$row = $result->fetch_assoc();
?>

<a class="button_a" href="pages/specialization/specialization.php">Вернуться</a>

<div class="main-interaction_block">
    <div class="interaction_block">
        <h2>Редактирование специальности</h2>
        <form name="form1" method="post" action="pages/specialization/specialization_update_post.php">
            <table>
                <tr>
                    <td><strong>ID:</strong></td>
                    <td><input name="id" type="text" value="<?= $row['id'] ?>" readonly></td>
                </tr>
                <tr>
                    <td><strong>Специальность:</strong></td>
                    <td><input name="string" type="text" value="<?= htmlspecialchars($row['string']) ?>" required></td>
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