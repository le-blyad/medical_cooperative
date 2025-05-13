<?php
require_once '../../includes/header.php';
require_once '../../includes/config.php';
?>

<h2>Добавление новых данных</h2>
<form name="form1" method="post" action="pages/blood_type/blood_type_insert_post.php">
    <table>
        <tr>
            <td><strong>Название:</strong></td>
            <td><input name="type" type="text" required></td>
        </tr>
    </table>
    <input type="submit" name="submit" value="Добавить" class="button_a">
</form>

<a class="button_a" href="pages/blood_type/blood_type.php">Вернуться</a>

<?php
require_once '../../includes/footer.php';
?>