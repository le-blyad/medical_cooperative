<?php
require_once '../../includes/header.php';
require_once '../../includes/config.php';
?>

<a class="button_a" href="pages/symptoms_patients/symptoms_patients.php">Вернуться</a>

<div class="main-interaction_block">
    <div class="interaction_block">
        <h2>Добавление нового симптома</h2>
        <form name="form1" method="post" action="pages/symptoms_patients/symptoms_patients_insert_post.php">
            <table>
                <tr>
                    <td><strong>Симптом:</strong></td>
                    <td><input name="symptom" type="text" required></td>
                </tr>
            </table>
            <input type="submit" name="submit" value="Добавить" class="btn">
        </form>
    </div>
</div>

<?php
require_once '../../includes/footer.php';
?>