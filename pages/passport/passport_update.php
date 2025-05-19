<?php
require_once '../../includes/header.php';
require_once '../../includes/config.php';

$id = $_GET['id'];

// Получение данных визита
$passport_sql = "SELECT * FROM passport WHERE id = ?";
$stmt = $conn->prepare($passport_sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$passport_result = $stmt->get_result();
$passport = $passport_result->fetch_assoc();

// Получение списков
$series = $conn->query("SELECT id, series FROM passport");
$number = $conn->query("SELECT id, number FROM passport");
$issued_by_whom = $conn->query("SELECT id, issued_by_whom FROM passport");
?>

<a class="button_a" href="pages/passport/passport.php">Вернуться</a>

<div class="main-interaction_block">
    <div class="interaction_block">
        <h2>Редактирование паспортных данных</h2>
        <form method="post" action="pages/passport/passport_update_post.php">
            <input type="hidden" name="id" value="<?= $passport['id'] ?>">
            <table>
                <tr>
                    <td><strong>ID:</strong></td>
                    <td><input type="text" value="<?= $passport['id'] ?>" readonly></td>
                </tr>
                <tr>
                    <td><strong>Серия:</strong></td>
                    <td>
                        <input type="int" name="series" value="<?= htmlspecialchars($passport['series']) ?>">
                    </td>
                </tr>
                <tr>
                    <td><strong>Номер:</strong></td>
                    <td>
                        <input type="int" name="number" value="<?= htmlspecialchars($passport['number']) ?>">
                    </td>
                </tr>
                <tr>
                    <td><strong>Кем выдан:</strong></td>
                    <td>
                        <input type="text" name="issued_by_whom" value="<?= htmlspecialchars($passport['issued_by_whom']) ?>">
                    </td>
                </tr>
            </table>
            <input type="submit" value="Сохранить" class="btn">
        </form>
    </div>
</div>

<?php
$conn->close();
require_once '../../includes/footer.php';
?>