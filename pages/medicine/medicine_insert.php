<?php
require_once '../../includes/header.php';
require_once '../../includes/config.php';
?>

<a class="button_a" href="pages/medicine/medicine.php">Вернуться</a>

<div class="main-interaction_block">
    <div class="interaction_block">
        <h2>Добавление нового лекарства</h2>
        <form name="form1" method="post" action="pages/medicine/medicine_insert_post.php">
            <table>
                <tr>
                    <td><strong>Название:</strong></td>
                    <td><input name="name" type="text" required></td>
                </tr>
                <tr>
                    <td><strong>Приложение:</strong></td>
                    <td><input name="application" type="text" required></td>
                </tr>
                <tr>
                    <td><strong>Действие:</strong></td>
                    <td><input name="action" type="text" required></td>
                </tr>
                <tr>
                    <td><strong>Эффект:</strong></td>
                    <td><input name="effect" type="text" required></td>
                </tr>
            </table>
            <input type="submit" name="submit" value="Добавить" class="btn">
        </form>
    </div>
</div>

<?php
require_once '../../includes/footer.php';
?>