<?php
require_once '../../includes/header.php';
require_once '../../includes/config.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM symptoms_patients WHERE id = $id");
$row = $result->fetch_assoc();
?>

<a class="button_a" href="pages/symptoms_patients/symptoms_patients.php">Вернуться</a>

<div class="main-interaction_block">
    <div class="interaction_block">
        <h2>Редактирование симптома</h2>
        <form name="form1" method="post" action="pages/symptoms_patients/symptoms_patients_update_post.php">
            <table>
                <tr>
                    <input name="id" type="hidden" value="<?= $row['id'] ?>">
                </tr>
                <tr>
                    <td><strong>Симптом:</strong></td>
                    <td><input name="symptom" type="text" value="<?= htmlspecialchars($row['symptom']) ?>" required></td>
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