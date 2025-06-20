<?php
require_once '../../includes/header.php';
require_once '../../includes/config.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM name_of_the_medicine WHERE id = $id");
$row = $result->fetch_assoc();

$medicines = $conn->query("SELECT id, name FROM medicine");
$visits = $conn->query("SELECT v.id, CONCAT(p.last_name, ' ', p.first_name) as patient_name, v.date_visit 
                         FROM visit v 
                         JOIN patient p ON v.patient = p.id");
?>

<a class="button_a" href="pages/name_of_the_medicine/name_of_the_medicine.php">Вернуться</a>

<div class="main-interaction_block">
    <div class="interaction_block">
        <h2>Редактирование назначенного лекарства</h2>
        <form name="form1" method="post" action="pages/name_of_the_medicine/name_of_the_medicine_update_post.php">
            <table>
                <tr>
                    <input name="id" type="hidden" value="<?= $row['id'] ?>">
                </tr>
                <tr>
                    <td><strong>Посещение:</strong></td>
                    <td>
                        <select name="visit" required>
                            <?php while($visit = $visits->fetch_assoc()): ?>
                                <option value="<?= $visit['id'] ?>" <?= $visit['id'] == $row['visit'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($visit['patient_name']) ?> - <?= htmlspecialchars(date('d.m.Y', strtotime($visit['date_visit']))) ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><strong>Лекарство:</strong></td>
                    <td>
                        <select name="medicine" required>
                            <?php while($medicine = $medicines->fetch_assoc()): ?>
                                <option value="<?= $medicine['id'] ?>" <?= $medicine['id'] == $row['medicine'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($medicine['name']) ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><strong>Дозировка:</strong></td>
                    <td><input name="dosage" type="text" value="<?= htmlspecialchars($row['dosage']) ?>" required></td>
                </tr>
                <tr>
                    <td><strong>Продолжительность курса:</strong></td>
                    <td><input name="duration_of_admission" type="text" value="<?= htmlspecialchars($row['duration_of_admission']) ?>" required></td>
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