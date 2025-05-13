<?php
require_once '../../includes/header.php';
require_once '../../includes/config.php';

$sql = "SELECT p.*, g.gen as gender_name, bt.type as blood_type_name 
        FROM patient p
        JOIN gender g ON p.gender = g.id
        JOIN blood_type bt ON p.blood_type = bt.id";

$result = $conn->query($sql);
?>

<h2>Список пациентов</h2>
<a class="button_change-add" href="pages/patients/patients_insert.php">Добавить</a>

<?php if ($result->num_rows > 0): ?>
<table class="table">
    <thead>
        <tr>
            <th>ФИО</th>
            <th>Пол</th>
            <th>Дата рождения</th>
            <th>Группа крови</th>
            <th>Телефон</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['last_name'] ?> <?= $row['first_name'] ?> <?= $row['patronymic'] ?></td>
            <td><?= $row['gender_name'] ?></td>
            <td><?= $row['data_of_birth'] ?></td>
            <td><?= $row['blood_type_name'] ?></td>
            <td><?= $row['phone_number'] ?></td>
            <td>
                <a class="button_change-update" href="pages/patients/patients_update.php?id=<?= $row['id'] ?>">Изменить</a>
            </td>
            <td>
                <a class="button_change-delete" href="pages/patients/patients_delete.php?id=<?= $row['id'] ?>" 
                onclick="return confirm('Вы уверены, что хотите удалить?')">Удалить</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<?php else: ?>
    <p>Пациенты не найдены.</p>
<?php endif;

$conn->close();
require_once '../../includes/footer.php';
?>
