<?php
require_once '../../includes/header.php';
require_once '../../includes/config.php';
?>

<a class="button_a" href="pages/specialization/specialization.php">Вернуться</a>

<div class="main-interaction_block">
    <div class="interaction_block">
        <h2>Добавление новой специальности</h2>
        <form name="form1" method="post" action="pages/specialization/specialization_insert_post.php">
            <table>
                <tr>
                    <td><strong>Специальность:</strong></td>
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