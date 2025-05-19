<?php
require_once '../../includes/header.php';
require_once '../../includes/config.php';

// Получаем списки для фильтров
$doctors = $conn->query("SELECT id, CONCAT(last_name, ' ', first_name, ' ', patronymic) as name FROM doctor ORDER BY last_name")->fetch_all(MYSQLI_ASSOC);
$patients = $conn->query("SELECT id, CONCAT(last_name, ' ', first_name, ' ', patronymic) as name FROM patient ORDER BY last_name")->fetch_all(MYSQLI_ASSOC);

// Параметры фильтра для 8-го запроса
$selected_doctor = $_GET['doctor'] ?? $doctors[0]['id'];
$selected_patient = $_GET['patient'] ?? '';
$selected_month = $_GET['month'] ?? date('n');
$selected_year = $_GET['year'] ?? date('Y');

// Массив всех запросов
$queries = [
    [
        'title' => '1. Пациенты по количеству обращений',
        'sql' => "SELECT p.last_name, p.first_name, p.patronymic, COUNT(v.id) as visit_count
                 FROM patient p
                 LEFT JOIN visit v ON p.id = v.patient
                 GROUP BY p.id
                 ORDER BY visit_count DESC",
        'columns' => [
            ['title' => '№', 'type' => 'counter'],
            ['title' => 'Пациент', 'value' => fn($row) => trim($row['last_name'].' '.$row['first_name'].' '.$row['patronymic'])],
            ['title' => 'Количество посещений', 'value' => 'visit_count']
        ],
        'empty_message' => 'Нет данных о посещениях пациентов'
    ],
    [
        'title' => '2. Диагнозы за последний месяц',
        'sql' => "SELECT d.string as diagnosis, COUNT(DISTINCT v.patient) as patient_count
                 FROM visit v
                 JOIN diagnosis d ON v.diagnosis = d.id
                 WHERE v.date_visit >= DATE_SUB(NOW(), INTERVAL 1 MONTH)
                 GROUP BY d.id
                 ORDER BY patient_count DESC",
        'columns' => [
            ['title' => '№', 'type' => 'counter'],
            ['title' => 'Диагноз', 'value' => 'diagnosis'],
            ['title' => 'Количество пациентов', 'value' => 'patient_count']
        ],
        'empty_message' => 'Нет данных о диагнозах за последний месяц'
    ],
    [
        'title' => '3. Количество пациентов у врачей по месяцам ('.date('Y').')',
        'sql' => "SELECT 
                    CONCAT(d.last_name, ' ', d.first_name, ' ', d.patronymic) AS doctor_name,
                    COUNT(DISTINCT CASE WHEN MONTH(v.date_visit) = 1 THEN v.patient END) AS Январь,
                    COUNT(DISTINCT CASE WHEN MONTH(v.date_visit) = 2 THEN v.patient END) AS Февраль,
                    COUNT(DISTINCT CASE WHEN MONTH(v.date_visit) = 3 THEN v.patient END) AS Март,
                    COUNT(DISTINCT CASE WHEN MONTH(v.date_visit) = 4 THEN v.patient END) AS Апрель,
                    COUNT(DISTINCT CASE WHEN MONTH(v.date_visit) = 5 THEN v.patient END) AS Май,
                    COUNT(DISTINCT CASE WHEN MONTH(v.date_visit) = 6 THEN v.patient END) AS Июнь,
                    COUNT(DISTINCT CASE WHEN MONTH(v.date_visit) = 7 THEN v.patient END) AS Июль,
                    COUNT(DISTINCT CASE WHEN MONTH(v.date_visit) = 8 THEN v.patient END) AS Август,
                    COUNT(DISTINCT CASE WHEN MONTH(v.date_visit) = 9 THEN v.patient END) AS Сентябрь,
                    COUNT(DISTINCT CASE WHEN MONTH(v.date_visit) = 10 THEN v.patient END) AS Октябрь,
                    COUNT(DISTINCT CASE WHEN MONTH(v.date_visit) = 11 THEN v.patient END) AS Ноябрь,
                    COUNT(DISTINCT CASE WHEN MONTH(v.date_visit) = 12 THEN v.patient END) AS Декабрь,
                    COUNT(DISTINCT v.patient) AS Всего
                FROM 
                    visit v
                JOIN 
                    doctor d ON v.doctor = d.id
                WHERE 
                    YEAR(v.date_visit) = YEAR(CURDATE())
                GROUP BY 
                    v.doctor, doctor_name
                ORDER BY 
                    Всего DESC",
        'columns' => [
            ['title' => 'Врач', 'value' => 'doctor_name'],
            ['title' => 'Янв', 'value' => 'Январь', 'default' => '0'],
            ['title' => 'Фев', 'value' => 'Февраль', 'default' => '0'],
            ['title' => 'Мар', 'value' => 'Март', 'default' => '0'],
            ['title' => 'Апр', 'value' => 'Апрель', 'default' => '0'],
            ['title' => 'Май', 'value' => 'Май', 'default' => '0'],
            ['title' => 'Июн', 'value' => 'Июнь', 'default' => '0'],
            ['title' => 'Июл', 'value' => 'Июль', 'default' => '0'],
            ['title' => 'Авг', 'value' => 'Август', 'default' => '0'],
            ['title' => 'Сен', 'value' => 'Сентябрь', 'default' => '0'],
            ['title' => 'Окт', 'value' => 'Октябрь', 'default' => '0'],
            ['title' => 'Ноя', 'value' => 'Ноябрь', 'default' => '0'],
            ['title' => 'Дек', 'value' => 'Декабрь', 'default' => '0'],
            ['title' => 'Всего', 'value' => 'Всего', 'highlight' => true]
        ],
        'responsive' => true,
        'empty_message' => 'Нет данных о посещениях за текущий год'
    ],
    [
        'title' => '4. Пациенты, обслуживавшиеся на дому за последний месяц',
        'sql' => "SELECT 
                    p.last_name, p.first_name, p.patronymic, 
                    COUNT(v.id) as visit_count
                 FROM 
                    patient p
                 JOIN 
                    visit v ON p.id = v.patient
                 WHERE 
                    v.office_in_hospital IS NULL 
                    AND v.date_visit >= DATE_SUB(CURRENT_DATE(), INTERVAL 1 MONTH)
                 GROUP BY 
                    p.id
                 ORDER BY 
                    visit_count DESC",
        'columns' => [
            ['title' => '№', 'type' => 'counter'],
            ['title' => 'Пациент', 'value' => fn($row) => trim($row['last_name'].' '.$row['first_name'].' '.$row['patronymic'])],
            ['title' => 'Количество визитов', 'value' => 'visit_count']
        ],
        'empty_message' => 'Нет данных о домашних визитах за последний месяц'
    ],
    [
        'title' => '5. Самые частые диагнозы по месяцам за год',
        'sql' => "SELECT 
                    month_year,
                    diagnosis,
                    max_count
                 FROM (
                    SELECT 
                        DATE_FORMAT(v.date_visit, '%m.%Y') AS month_year,
                        d.string AS diagnosis,
                        COUNT(*) AS diagnosis_count,
                        MAX(COUNT(*)) OVER (PARTITION BY DATE_FORMAT(v.date_visit, '%Y-%m')) AS max_count
                    FROM 
                        visit v
                    JOIN 
                        diagnosis d ON v.diagnosis = d.id
                    WHERE 
                        v.date_visit >= DATE_SUB(CURRENT_DATE(), INTERVAL 1 YEAR)
                    GROUP BY 
                        month_year, d.string
                 ) AS subquery
                 WHERE 
                    diagnosis_count = max_count
                 ORDER BY 
                    month_year",
        'columns' => [
            ['title' => 'Дата', 'value' => 'month_year'],
            ['title' => 'Диагноз', 'value' => 'diagnosis'],
            ['title' => 'Количество случаев', 'value' => 'max_count']
        ],
        'empty_message' => 'Нет данных о диагнозах за последний год'
    ],
    [
        'title' => '6. Количество уникальных лекарств',
        'sql' => "SELECT COUNT(DISTINCT m.id) AS unique_medicines_count
                 FROM medicine m
                 JOIN name_of_the_medicine nom ON m.id = nom.medicine",
        'columns' => [
            ['title' => 'Количество уникальных лекарств', 'value' => 'unique_medicines_count']
        ],
        'empty_message' => 'Нет данных о лекарствах'
    ],
    [
        'title' => '7. Пациенты по возрастным группам',
        'sql' => "SELECT 
                    CASE 
                        WHEN TIMESTAMPDIFF(YEAR, p.data_of_birth, CURRENT_DATE()) BETWEEN 1 AND 6 THEN '1-6 лет'
                        WHEN TIMESTAMPDIFF(YEAR, p.data_of_birth, CURRENT_DATE()) BETWEEN 7 AND 17 THEN '7-17 лет'
                        WHEN TIMESTAMPDIFF(YEAR, p.data_of_birth, CURRENT_DATE()) BETWEEN 18 AND 25 THEN '18-25 лет'
                        WHEN TIMESTAMPDIFF(YEAR, p.data_of_birth, CURRENT_DATE()) BETWEEN 26 AND 45 THEN '26-45 лет'
                        WHEN TIMESTAMPDIFF(YEAR, p.data_of_birth, CURRENT_DATE()) > 45 THEN '45+ лет'
                        ELSE 'Менее 1 года'
                    END AS age_group,
                    COUNT(*) AS patient_count
                 FROM 
                    patient p
                 GROUP BY 
                    age_group
                 ORDER BY 
                    age_group",
        'columns' => [
            ['title' => 'Возрастная группа', 'value' => 'age_group'],
            ['title' => 'Количество пациентов', 'value' => 'patient_count']
        ],
        'empty_message' => 'Нет данных о пациентах'
    ],
    [
        'title' => '8. Домашние визиты врача',
        'sql' => function() use ($conn, $selected_doctor, $selected_patient, $selected_month, $selected_year) {
            $sql = "SELECT 
                        CONCAT(d.last_name, ' ', d.first_name, ' ', d.patronymic) AS doctor_name,
                        CONCAT(p.last_name, ' ', p.first_name, ' ', p.patronymic) AS patient_name,
                        CASE 
                            WHEN MONTH(v.date_visit) = 1 THEN 'Январь'
                            WHEN MONTH(v.date_visit) = 2 THEN 'Февраль'
                            WHEN MONTH(v.date_visit) = 3 THEN 'Март'
                            WHEN MONTH(v.date_visit) = 4 THEN 'Апрель'
                            WHEN MONTH(v.date_visit) = 5 THEN 'Май'
                            WHEN MONTH(v.date_visit) = 6 THEN 'Июнь'
                            WHEN MONTH(v.date_visit) = 7 THEN 'Июль'
                            WHEN MONTH(v.date_visit) = 8 THEN 'Август'
                            WHEN MONTH(v.date_visit) = 9 THEN 'Сентябрь'
                            WHEN MONTH(v.date_visit) = 10 THEN 'Октябрь'
                            WHEN MONTH(v.date_visit) = 11 THEN 'Ноябрь'
                            WHEN MONTH(v.date_visit) = 12 THEN 'Декабрь'
                        END AS month_name,
                        YEAR(v.date_visit) AS year,
                        COUNT(*) AS home_visit_count,
                        GROUP_CONCAT(DATE_FORMAT(v.date_visit, '%d.%m.%Y') ORDER BY v.date_visit SEPARATOR ', ') AS visit_dates
                    FROM 
                        visit v
                    JOIN 
                        doctor d ON v.doctor = d.id
                    JOIN
                        patient p ON v.patient = p.id
                    WHERE
                        v.office_in_hospital IS NULL 
                        AND v.doctor = ?
                        AND MONTH(v.date_visit) = ?
                        AND YEAR(v.date_visit) = ?";
            
            $params = [$selected_doctor, $selected_month, $selected_year];
            
            if (!empty($selected_patient)) {
                $sql .= " AND v.patient = ?";
                $params[] = $selected_patient;
            }
            
            $sql .= " GROUP BY 
                        doctor_name, patient_name, month_name, year
                    ORDER BY 
                        patient_name, year, month_name";
            
            $stmt = $conn->prepare($sql);
            $stmt->bind_param(str_repeat('i', count($params)), ...$params);
            $stmt->execute();
            return $stmt->get_result();
        },
        'columns' => [
            ['title' => '№', 'type' => 'counter'],
            ['title' => 'Врач', 'value' => 'doctor_name'],
            ['title' => 'Пациент', 'value' => 'patient_name'],
            ['title' => 'Месяц', 'value' => 'month_name'],
            ['title' => 'Год', 'value' => 'year'],
            ['title' => 'Количество визитов', 'value' => 'home_visit_count'],
            ['title' => 'Даты визитов', 'value' => 'visit_dates']
        ],
        'empty_message' => 'Нет данных о домашних визитах для выбранных параметров',
        'filter_form' => true
    ],
    [
        'title' => '9. Пациенты с более чем 2 визитами в месяц',
        'sql' => "SELECT 
                    p.id,
                    p.last_name,
                    p.first_name,
                    p.patronymic,
                    DATE_FORMAT(v.date_visit, '%Y-%m') AS month,
                    COUNT(*) AS visit_count
                 FROM 
                    patient p
                 JOIN 
                    visit v ON p.id = v.patient
                 GROUP BY 
                    p.id, p.last_name, p.first_name, p.patronymic, month
                 HAVING 
                    COUNT(*) > 2
                 ORDER BY 
                    month, visit_count DESC",
        'columns' => [
            ['title' => '№', 'type' => 'counter'],
            ['title' => 'Пациент', 'value' => fn($row) => trim($row['last_name'].' '.$row['first_name'].' '.$row['patronymic'])],
            ['title' => 'Месяц', 'value' => 'month'],
            ['title' => 'Количество визитов', 'value' => 'visit_count']
        ],
        'empty_message' => 'Нет пациентов с более чем 2 визитами в месяц'
    ],
    [
        'title' => '10. Пациенты по полу',
        'sql' => "SELECT 
                    g.gen AS gender,
                    COUNT(*) AS patient_count
                 FROM 
                    patient p
                 JOIN 
                    gender g ON p.gender = g.id
                 GROUP BY 
                    g.gen",
        'columns' => [
            ['title' => 'Пол', 'value' => 'gender'],
            ['title' => 'Количество пациентов', 'value' => 'patient_count']
        ],
        'empty_message' => 'Нет данных о пациентах'
    ]
];
?>

<div class="container mt-4">
    <h1 class="mb-4">Отчеты медицинского кооператива</h1>
    
    <div class="reports-container">
        <?php foreach ($queries as $index => $query): ?>
            <?php
            // Выполняем запрос
            if (is_callable($query['sql'])) {
                $result = $query['sql']();
            } else {
                $result = $conn->query($query['sql']);
            }
            $has_rows = $result && $result->num_rows > 0;
            ?>
            
            <section class="report-section mb-5 p-3 border rounded">
                <h2 class="h4 mb-3"><?= $query['title'] ?></h2>
                
                <?php if (!empty($query['filter_form']) && $index == 7): ?>
                    <form method="get" class="report-filter mb-4" action="#report-8">
                        <input type="hidden" name="page" value="reports">
                        
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="doctor">Врач:</label>
                                <select name="doctor" id="doctor" class="form-control">
                                    <?php foreach ($doctors as $doctor): ?>
                                        <option value="<?= $doctor['id'] ?>" <?= $selected_doctor == $doctor['id'] ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($doctor['name']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            
                            <div class="form-group col-md-3">
                                <label for="patient">Пациент:</label>
                                <select name="patient" id="patient" class="form-control">
                                    <option value="">-</option>
                                    <?php foreach ($patients as $patient): ?>
                                        <option value="<?= $patient['id'] ?>" <?= $selected_patient == $patient['id'] ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($patient['name']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            
                            <div class="form-group col-md-2">
                                <label for="month">Месяц:</label>
                                <select name="month" id="month" class="form-control">
                                    <?php 
                                    $months = [
                                        1 => 'Январь', 2 => 'Февраль', 3 => 'Март', 4 => 'Апрель',
                                        5 => 'Май', 6 => 'Июнь', 7 => 'Июль', 8 => 'Август',
                                        9 => 'Сентябрь', 10 => 'Октябрь', 11 => 'Ноябрь', 12 => 'Декабрь'
                                    ];
                                    foreach ($months as $num => $name): ?>
                                        <option value="<?= $num ?>" <?= $selected_month == $num ? 'selected' : '' ?>>
                                            <?= $name ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            
                            <div class="form-group col-md-2">
                                <label for="year">Год:</label>
                                <input type="number" name="year" id="year" class="form-control" 
                                       value="<?= htmlspecialchars($selected_year) ?>" min="2000" max="<?= date('Y') ?>">
                            </div>
                            
                            <button type="submit" class="btn">Применить</button>
                            
                        </div>
                    </form>
                <?php endif; ?>
                
                <?php if ($has_rows): ?>
                    <?php if (!empty($query['responsive'])): ?>
                    <div class="table-responsive">
                    <?php endif; ?>
                    
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <?php foreach ($query['columns'] as $column): ?>
                                    <th><?= $column['title'] ?></th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter = 1; ?>
                            <?php while($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <?php foreach ($query['columns'] as $column): ?>
                                        <td <?= !empty($column['highlight']) ? 'class="table-primary"' : '' ?>>
                                            <?php if ($column['type'] ?? '' === 'counter'): ?>
                                                <?= $counter++ ?>
                                            <?php else: ?>
                                                <?php
                                                $value = is_callable($column['value']) ? 
                                                    $column['value']($row) : 
                                                    ($row[$column['value']] ?? $column['default'] ?? '');
                                                echo htmlspecialchars($value);
                                                ?>
                                            <?php endif; ?>
                                        </td>
                                    <?php endforeach; ?>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                    
                    <?php if (!empty($query['responsive'])): ?>
                    </div>
                    <?php endif; ?>
                <?php else: ?>
                    <div class="alert alert-info"><?= $query['empty_message'] ?></div>
                <?php endif; ?>
            </section>
        <?php endforeach; ?>
    </div>
</div>

<?php require_once '../../includes/footer.php'; ?>