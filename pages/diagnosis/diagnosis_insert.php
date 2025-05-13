<?php
require_once '../../includes/header.php';
require_once '../../includes/config.php';
?>

<a class="button_a" href="pages/diagnosis/diagnosis.php">Вернуться</a>

<div class="main-interaction_block">
    <div class="interaction_block">
        <h2>Добавление нового диагноза</h2>
        <form name="form1" method="post" action="pages/diagnosis/diagnosis_insert_post.php">
            <table>
                <tr>
                    <td><strong>Диагноз:</strong></td>
                    <td><input name="string" type="text" required></td>
                </tr>
            </table>
            <input type="submit" name="submit" value="Добавить" class="btn">
        </form>
    </div>
</div>

<?php
require_once '../../includes/footer.php';
?>