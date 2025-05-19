<?php
require_once 'includes/header.php';
require_once 'includes/config.php';
?>

<main class="container">
    <h1>Медицинский кооператив</h1>

     <div class="dashboard">

        <div class="dashboard-item">
            <h2>Отчеты</h2>
            <p>Доступно 10 отчетов</p>
            <a href="pages/reports/reports.php" class="btn">Перейти</a>
        </div>

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
            <h2>Приемы</h2>
            <p>Всего посещений: 
                <?php 
                    $result = $conn->query("SELECT COUNT(*) as cnt FROM visit");
                    echo $result->fetch_assoc()['cnt'];
                    ?>
            </p>
            <a href="pages/visits/visits.php" class="btn">Перейти</a>
        </div>

        <div class="dashboard-item">
            <h2>Группы крови</h2>
            <p>Групп крови: 
                <?php 
                    $result = $conn->query("SELECT COUNT(*) as cnt FROM blood_type");
                    echo $result->fetch_assoc()['cnt'];
                    ?>
            </p>
            <a href="pages/blood_type/blood_type.php" class="btn">Перейти</a>
        </div>

        <div class="dashboard-item">
            <h2>Диагнозы</h2>
            <p>Всего диагнозов: 
                <?php 
                    $result = $conn->query("SELECT COUNT(*) as cnt FROM diagnosis");
                    echo $result->fetch_assoc()['cnt'];
                    ?>
            </p>
            <a href="pages/diagnosis/diagnosis.php" class="btn">Перейти</a>
        </div>

        <div class="dashboard-item">
            <h2>Пол</h2>
            <p>Всего полов: 
                <?php 
                    $result = $conn->query("SELECT COUNT(*) as cnt FROM gender");
                    echo $result->fetch_assoc()['cnt'];
                    ?>
            </p>
            <a href="pages/gender/gender.php" class="btn">Перейти</a>
        </div>

        <div class="dashboard-item">
            <h2>Должность</h2>
            <p>Всего должностей: 
                <?php 
                    $result = $conn->query("SELECT COUNT(*) as cnt FROM post");
                    echo $result->fetch_assoc()['cnt'];
                    ?>
            </p>
            <a href="pages/post/post.php" class="btn">Перейти</a>
        </div>

        <div class="dashboard-item">
            <h2>Предписания</h2>
            <p>Всего предписаний: 
                <?php 
                    $result = $conn->query("SELECT COUNT(*) as cnt FROM prescription");
                    echo $result->fetch_assoc()['cnt'];
                    ?>
            </p>
            <a href="pages/prescription/prescription.php" class="btn">Перейти</a>
        </div>

        <div class="dashboard-item">
            <h2>Специальности</h2>
            <p>Всего специальностей: 
                <?php 
                    $result = $conn->query("SELECT COUNT(*) as cnt FROM specialization");
                    echo $result->fetch_assoc()['cnt'];
                    ?>
            </p>
            <a href="pages/specialization/specialization.php" class="btn">Перейти</a>
        </div>

        <div class="dashboard-item">
            <h2>Симпотомы</h2>
            <p>Всего симпотомов: 
                <?php 
                    $result = $conn->query("SELECT COUNT(*) as cnt FROM symptoms_patients");
                    echo $result->fetch_assoc()['cnt'];
                    ?>
            </p>
            <a href="pages/symptoms_patients/symptoms_patients.php" class="btn">Перейти</a>
        </div>

        <div class="dashboard-item">
            <h2>Лекарства</h2>
            <p>Всего лекарств: 
                <?php 
                    $result = $conn->query("SELECT COUNT(*) as cnt FROM medicine");
                    echo $result->fetch_assoc()['cnt'];
                    ?>
            </p>
            <a href="pages/medicine/medicine.php" class="btn">Перейти</a>
        </div>

        <div class="dashboard-item">
            <h2>Рецепты</h2>
            <p>Всего рецептов: 
                <?php 
                    $result = $conn->query("SELECT COUNT(*) as cnt FROM name_of_the_medicine");
                    echo $result->fetch_assoc()['cnt'];
                    ?>
            </p>
            <a href="pages/name_of_the_medicine/name_of_the_medicine.php" class="btn">Перейти</a>
        </div>
        
        <div class="dashboard-item">
            <h2>Паспорт</h2>
            <p>Всего паспортов: 
                <?php 
                    $result = $conn->query("SELECT COUNT(*) as cnt FROM passport");
                    echo $result->fetch_assoc()['cnt'];
                    ?>
            </p>
            <a href="pages/passport/passport.php" class="btn">Перейти</a>
        </div>

    </div>
</main>

<?php
require_once 'includes/footer.php';
?>