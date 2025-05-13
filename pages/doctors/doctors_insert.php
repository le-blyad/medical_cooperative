<?php
require_once '../../includes/header.php';
require_once '../../includes/config.php';

$specializations = $conn->query("SELECT * FROM specialization");
$posts = $conn->query("SELECT * FROM post");
?>

<a class="button_a" href="pages/doctors/doctors.php">Вернуться</a>

<div class="main-interaction_block">
    <div class="interaction_block">
        <h2>Добавление врача</h2>
        <form method="post" action="pages/doctors/doctors_insert_post.php">
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
                    <td><strong>Дата рождения:</strong></td>
                    <td><input type="date" name="date_of_birth" required></td>
                </tr>
                <tr>
                    <td><strong>Телефон:</strong></td>
                    <td><input type="text" name="number_phone" required></td>
                </tr>
                <tr>
                    <td><strong>Эл.Почта:</strong></td>
                    <td><input type="email" name="email" required></td>
                </tr>
                <tr>
                    <td><strong>Специализация:</strong></td>
                    <td>
                        <select name="specialization" required>
                            <option value="">Выберите</option>
                            <?php while ($row = $specializations->fetch_assoc()): ?>
                                <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['string']) ?></option>
                            <?php endwhile; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><strong>Должность:</strong></td>
                    <td>
                        <select name="post" required>
                            <option value="">Выберите</option>
                            <?php while ($row = $posts->fetch_assoc()): ?>
                                <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['string']) ?></option>
                            <?php endwhile; ?>
                        </select>
                    </td>
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