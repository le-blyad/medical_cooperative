<?php
require_once '../../includes/config.php';
require_once '../../includes/header.php';

// Массив всех запросов и их параметров
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
            ['title' => 'Пациент', 'value' => fn($row) => $row['last_name'].' '.$row['first_name'].' '.$row['patronymic']],
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
                 GROUP BY d.id",
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
    ]
    // Добавьте остальные запросы по аналогии
];
?>

<div class="reports-container">
    <?php foreach ($queries as $query): ?>
        <?php
        $result = $conn->query($query['sql']);
        $has_rows = $result && $result->num_rows > 0;
        ?>
        
        <section class="report-section">
            <h2><?= $query['title'] ?></h2>
            
            <?php if ($has_rows): ?>
                <?php if (!empty($query['responsive'])): ?>
                <div class="table-responsive">
                <?php endif; ?>
                
                <table class="table">
                    <thead>
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
                                    <td <?= !empty($column['highlight']) ? 'class="highlight"' : '' ?>>
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
                <p class="no-data"><?= $query['empty_message'] ?></p>
            <?php endif; ?>
        </section>
    <?php endforeach; ?>
</div>

<?php require_once '../../includes/footer.php'; ?>