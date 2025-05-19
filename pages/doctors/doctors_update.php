<?php
require_once '../../includes/header.php';
require_once '../../includes/config.php';

$id = $_GET['id'];
$doctor_result = $conn->query("SELECT * FROM doctor WHERE id = $id");
$doctor = $doctor_result->fetch_assoc();
$specializations = $conn->query("SELECT * FROM specialization");
$posts = $conn->query("SELECT * FROM post");
?>

<a class="button_a" href="pages/doctors/doctors.php">Вернуться</a>

<div class="main-interaction_block">
    <div class="interaction_block">
        <h2>Редактирование врача</h2>
        <form method="post" action="pages/doctors/doctors_update_post.php">
            <input type="hidden" name="id" value="<?= $doctor['id'] ?>">
            <table>
                <tr>
                    <td><strong>ID:</strong></td>
                    <td>
                    <input type="text" value="<?= $doctor['id'] ?>" readonly>
                    <input type="hidden" name="id" value="<?= $doctor['id'] ?>">
                    </td>
                </tr>
            <tr>
                <tr>
                    <td><strong>Фамилия:</strong></td>
                    <td><input type="text" name="last_name" value="<?= htmlspecialchars($doctor['last_name']) ?>" required></td>
                </tr>
                <tr>
                    <td><strong>Имя:</strong></td>
                    <td><input type="text" name="first_name" value="<?= htmlspecialchars($doctor['first_name']) ?>" required></td>
                </tr>
                <tr>
                    <td><strong>Отчество:</strong></td>
                    <td><input type="text" name="patronymic" value="<?= htmlspecialchars($doctor['patronymic']) ?>"></td>
                </tr>
                <tr>
                    <td><strong>Дата рождения:</strong></td>
                    <td><input type="date" name="date_of_birth" value="<?= $doctor['date_of_birth'] ?>" required></td>
                </tr>
                <tr>
                    <td><strong>Телефон:</strong></td>
                    <td><input type="text" name="number_phone" value="<?= htmlspecialchars($doctor['number_phone']) ?>" required></td>
                </tr>
                <tr>
                    <td><strong>Эл.Почта:</strong></td>
                    <td><input type="email" name="email" value="<?= htmlspecialchars($doctor['email']) ?>" required></td>
                </tr>
                <tr>
                    <td><strong>Специализация:</strong></td>
                    <td>
                        <select name="specialization" required>
                            <?php while ($row = $specializations->fetch_assoc()): ?>
                                <option value="<?= $row['id'] ?>" <?= $row['id'] == $doctor['specialization'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($row['string']) ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><strong>Должность:</strong></td>
                    <td>
                        <select name="post" required>
                            <?php while ($row = $posts->fetch_assoc()): ?>
                                <option value="<?= $row['id'] ?>" <?= $row['id'] == $doctor['post'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($row['string']) ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
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