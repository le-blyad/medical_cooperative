<?php
require_once '../../includes/header.php';
require_once '../../includes/config.php';

// Получаем список полов и групп крови
$genders = $conn->query("SELECT * FROM gender");
$blood_types = $conn->query("SELECT * FROM blood_type");
?>

<a class="button_a" href="pages/patients/patients.php">Вернуться</a>

<div class="main-interaction_block">
    <div class="interaction_block">
        <h2>Добавление пациента</h2>
        <form method="post" action="pages/patients/patients_insert_post.php">
            <table>
                <tr>
                    <td><strong>Фамилия:</strong></td>
                    <td><input type="text" name="last_name" required></td>
                </tr>
                <tr>
                    <td><strong>Имя:</strong></td>
                    <td><input type="text" name="first_name" required></td>
                </tr>
                <tr>
                    <td><strong>Отчество:</strong></td>
                    <td><input type="text" name="patronymic"></td>
                </tr>
                <tr>
                    <td><strong>Пол:</strong></td>
                    <td>
                        <select name="gender" required>
                            <option value="">Выберите</option>
                            <?php while ($row = $genders->fetch_assoc()): ?>
                                <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['gen']) ?></option>
                            <?php endwhile; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><strong>Дата рождения:</strong></td>
                    <td><input type="date" name="data_of_birth" required></td>
                </tr>
                <tr>
                    <td><strong>Группа крови:</strong></td>
                    <td>
                        <select name="blood_type" required>
                            <option value="">Выберите</option>
                            <?php while ($row = $blood_types->fetch_assoc()): ?>
                                <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['type']) ?></option>
                            <?php endwhile; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><strong>Телефон:</strong></td>
                    <td><input type="text" name="phone_number" required></td>
                </tr>
            </table>
            <input type="submit" value="Добавить" class="btn">
        </form>
    </div>
</div>

<?php
$conn->close();
require_once '../../includes/footer.php';
?>