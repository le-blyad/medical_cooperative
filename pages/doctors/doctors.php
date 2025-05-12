<?php
require_once '../../includes/header.php';
require_once '../../includes/config.php';

$sql = "SELECT d.*, s.string as specialization_name, p.string as post_name 
        FROM doctor d
        JOIN specialization s ON d.specialization = s.id
        JOIN post p ON d.post = p.id";

$result = $conn->query($sql);
?>

<h2>Список врачей</h2>
<table class="table">
    <thead>
        <tr>
            <th>ФИО</th>
            <th>Дата рождения</th>
            <th>Телефон</th>
            <th>Эл.Почта</th>
            <th>Специализация</th>
            <th>Должность</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['last_name']) ?> <?= htmlspecialchars($row['first_name']) ?> <?= htmlspecialchars($row['patronymic']) ?></td>
            <td><?= htmlspecialchars($row['date_of_birth']) ?></td>
            <td><?= htmlspecialchars($row['number_phone']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['specialization_name']) ?></td>
            <td><?= htmlspecialchars($row['post_name']) ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php require_once '../../includes/footer.php'; ?>