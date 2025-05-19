<?php
require_once '../../includes/header.php';
require_once '../../includes/config.php';

$id = $_GET['id'];

// Получение данных визита
$visit_sql = "SELECT * FROM visit WHERE id = ?";
$stmt = $conn->prepare($visit_sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$visit_result = $stmt->get_result();
$visit = $visit_result->fetch_assoc();

// Получение списков
$patients = $conn->query("SELECT id, last_name, first_name, patronymic FROM patient");
$doctors = $conn->query("SELECT id, last_name, first_name, patronymic FROM doctor");
$symptoms_list = $conn->query("SELECT id, symptom FROM symptoms_patients");
$diagnoses = $conn->query("SELECT id, string FROM diagnosis");
$prescriptions = $conn->query("SELECT id, name_prescription FROM prescription");
?>

<a class="button_a" href="pages/visits/visits.php">Вернуться</a>

<div class="main-interaction_block">
    <div class="interaction_block">
        <h2>Редактирование посещения</h2>
        <form method="post" action="pages/visits/visits_update_post.php">
            <input type="hidden" name="id" value="<?= $visit['id'] ?>">
            <table>
                <tr>
                    <input name="id" type="hidden" value="<?= $visit['id'] ?>">
                </tr>
                <tr>
                    <td><strong>Пациент:</strong></td>
                    <td>
                        <select name="patient" required>
                            <?php while ($row = $patients->fetch_assoc()): ?>
                                <option value="<?= $row['id'] ?>" <?= $row['id'] == $visit['patient'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars("{$row['last_name']} {$row['first_name']} {$row['patronymic']}") ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><strong>Врач:</strong></td>
                    <td>
                        <select name="doctor" required>
                            <?php while ($row = $doctors->fetch_assoc()): ?>
                                <option value="<?= $row['id'] ?>" <?= $row['id'] == $visit['doctor'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars("{$row['last_name']} {$row['first_name']} {$row['patronymic']}") ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><strong>Дата и время:</strong></td>
                    <td>
                        <input type="datetime-local" name="date_visit" 
                            value="<?= date('Y-m-d\TH:i', strtotime($visit['date_visit'])) ?>" required>
                    </td>
                </tr>
                <tr>
                    <td><strong>Кабинет:</strong></td>
                    <td>
                        <input type="text" name="office_in_hospital" 
                            value="<?= htmlspecialchars($visit['office_in_hospital']) ?>">
                    </td>
                </tr>
                <tr>
                    <td><strong>Симптомы:</strong></td>
                    <td>
                        <select name="symptoms" required>
                            <?php while ($row = $symptoms_list->fetch_assoc()): ?>
                                <option value="<?= $row['id'] ?>" <?= $row['id'] == $visit['symptoms'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($row['symptom']) ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><strong>Диагноз:</strong></td>
                    <td>
                        <select name="diagnosis" required>
                            <?php while ($row = $diagnoses->fetch_assoc()): ?>
                                <option value="<?= $row['id'] ?>" <?= $row['id'] == $visit['diagnosis'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($row['string']) ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><strong>Предписания:</strong></td>
                    <td>
                        <select name="prescription" required>
                            <?php while ($row = $prescriptions->fetch_assoc()): ?>
                                <option value="<?= $row['id'] ?>" <?= $row['id'] == $visit['prescription'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($row['name_prescription']) ?>
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