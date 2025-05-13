<?php
require_once '../../includes/header.php';
require_once '../../includes/config.php';

// Получаем данные для выпадающих списков
$patients = $conn->query("SELECT id, last_name, first_name, patronymic FROM patient");
$doctors = $conn->query("SELECT id, last_name, first_name, patronymic FROM doctor");
$symptoms = $conn->query("SELECT id, symptom FROM symptoms_patients");
$diagnoses = $conn->query("SELECT id, string FROM diagnosis");
$prescriptions = $conn->query("SELECT id, name_prescription FROM prescription");
?>

<h2>Добавить посещение</h2>
<form method="POST" action="visit_insert_post.php">
    <div class="form-group">
        <label>Пациент:</label>
        <select name="patient" class="form-control" required>
            <?php while($row = $patients->fetch_assoc()): ?>
                <option value="<?= $row['id'] ?>">
                    <?= htmlspecialchars($row['last_name'] . ' ' . $row['first_name'] . ' ' . $row['patronymic']) ?>
                </option>
            <?php endwhile; ?>
        </select>
    </div>

    <div class="form-group">
        <label>Врач:</label>
        <select name="doctor" class="form-control" required>
            <?php while($row = $doctors->fetch_assoc()): ?>
                <option value="<?= $row['id'] ?>">
                    <?= htmlspecialchars($row['last_name'] . ' ' . $row['first_name'] . ' ' . $row['patronymic']) ?>
                </option>
            <?php endwhile; ?>
        </select>
    </div>

    <div class="form-group">
        <label>Дата и время:</label>
        <input type="datetime-local" name="date_visit" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Кабинет (оставьте пустым для вызова на дом):</label>
        <input type="number" name="office_in_hospital" class="form-control">
    </div>

    <div class="form-group">
        <label>Симптомы:</label>
        <select name="symptoms" class="form-control" required>
            <?php while($row = $symptoms->fetch_assoc()): ?>
                <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['symptom']) ?></option>
            <?php endwhile; ?>
        </select>
    </div>

    <div class="form-group">
        <label>Диагноз:</label>
        <select name="diagnosis" class="form-control" required>
            <?php while($row = $diagnoses->fetch_assoc()): ?>
                <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['string']) ?></option>
            <?php endwhile; ?>
        </select>
    </div>

    <div class="form-group">
        <label>Предписание:</label>
        <select name="prescription" class="form-control" required>
            <?php while($row = $prescriptions->fetch_assoc()): ?>
                <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['name_prescription']) ?></option>
            <?php endwhile; ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Добавить</button>
</form>

<?php require_once '../../includes/footer.php'; ?>