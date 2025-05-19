<?php
require_once '../../includes/header.php';
require_once '../../includes/config.php';

$sql = "SELECT 
            p.last_name as patient_last_name, 
            p.first_name as patient_first_name, 
            p.patronymic as patient_patronymic,
            d.last_name as doctor_last_name, 
            d.first_name as doctor_first_name, 
            d.patronymic as doctor_patronymic,
            v.date_visit,
            v.office_in_hospital,
            v.id,
            sym.symptom,
            diag.string as diagnosis,
            pres.name_prescription as prescription,
            v.id
        FROM visit v
        JOIN patient p ON v.patient = p.id
        JOIN doctor d ON v.doctor = d.id
        JOIN symptoms_patients sym ON v.symptoms = sym.id
        JOIN diagnosis diag ON v.diagnosis = diag.id
        JOIN prescription pres ON v.prescription = pres.id
        ORDER BY v.id ASC";

$result = $conn->query($sql);

if (!$result) {
    die("Ошибка запроса: " . $conn->error);
}
?>

<h2>История посещений</h2>
<a href="pages/visits/visits_insert.php" class="btn">Добавить</a>

<?php if ($result->num_rows > 0): ?>
<table class="table">
    <thead>
        <tr>
            <th>Номер приёма</th>
            <th>Пациент</th>
            <th>Врач</th>
            <th>Дата посещения</th>
            <th>Номер кабинета</th>
            <th>Симптомы</th>
            <th>Диагноз</th>
            <th>Предписания</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): 
            $visit_date = new DateTime($row['date_visit']);
            $formatted_date = $visit_date->format('H:i d.m.Y');
            $office = $row['office_in_hospital'] ?? 'На дому';
        ?>
            <tr>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars("{$row['patient_last_name']} {$row['patient_first_name']} {$row['patient_patronymic']}") ?></td>
                <td><?= htmlspecialchars("{$row['doctor_last_name']} {$row['doctor_first_name']} {$row['doctor_patronymic']}") ?></td>
                <td><?= htmlspecialchars($formatted_date) ?></td>
                <td><?= htmlspecialchars($office) ?></td>
                <td><?= htmlspecialchars($row['symptom']) ?></td>
                <td><?= htmlspecialchars($row['diagnosis']) ?></td>
                <td><?= htmlspecialchars($row['prescription']) ?></td>
                <td>
                    <a href="pages/visits/visits_update.php?id=<?= $row['id'] ?>" class="btn-edit">Изменить</a>
                    <a href="pages/visits/visits_delete.php?id=<?= $row['id'] ?>" class="btn-delete" onclick="return confirm('Вы уверены, что хотите удалить??')">Удалить</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<?php else: ?>
    <p>Записей о посещениях не найдено.</p>
<?php endif; ?>

<?php 
$conn->close();
require_once '../../includes/footer.php'; 
?>