<?php
require_once 'includes/header.php';
require_once 'includes/config.php';
?>

<main class="container">
    <h1>Медицинский кооператив</h1>

    <div class="dashboard">
        <div class="dashboard-item">
            <h2>Пациенты</h2>
            <p>Всего пациентов: 
                <?php 
                $result = $conn->query("SELECT COUNT(*) as cnt FROM patient");
                echo $result->fetch_assoc()['cnt'];
                ?>
            </p>
            <a href="pages/patients/patients.php" class="btn">Перейти</a>
        </div>
        
        <div class="dashboard-item">
            <h2>Врачи</h2>
            <p>Всего врачей: 
                <?php 
                $result = $conn->query("SELECT COUNT(*) as cnt FROM doctor");
                echo $result->fetch_assoc()['cnt'];
                ?>
            </p>
            <a href="pages/doctors/doctors.php" class="btn">Перейти</a>
        </div>
        
        <div class="dashboard-item">
            <h2>Посещения</h2>
            <p>Всего посещений: 
                <?php 
                    $result = $conn->query("SELECT COUNT(*) as cnt FROM visit");
                    echo $result->fetch_assoc()['cnt'];
                    ?>
            </p>
            <a href="pages/visits/visits.php" class="btn">Перейти</a>
        </div>

        <div class="dashboard-item">
            <h2>Отчеты</h2>
            <p>Доступно 10 отчетов</p>
            <a href="pages/reports/reports.php" class="btn">Перейти</a>
        </div>
    </div>
</main>

<?php
require_once 'includes/footer.php';
?>