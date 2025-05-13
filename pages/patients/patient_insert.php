<?php
require_once '../../includes/header.php';
require_once '../../includes/config.php';

// Получаем данные для списков
$genders = $conn->query("SELECT * FROM gender");
$blood_types = $conn->query("SELECT * FROM blood_type");

// Получаем данные пациента (если редактирование)
$patient = null;
if(isset($_GET['id'])) {
    $stmt = $conn->prepare("SELECT * FROM patient WHERE id = ?");
    $stmt->bind_param("i", $_GET['id']);
    $stmt->execute();
    $patient = $stmt->get_result()->fetch_assoc();
}
?>

<h2><?= $patient ? 'Редактирование' : 'Добавление' ?> пациента</h2>

<form method="POST" action="patient_save.php">
    <?php if($patient): ?>
    <input type="hidden" name="id" value="<?= $patient['id'] ?>">
    <?php endif; ?>
    
    <div class="form-group">
        <label>Фамилия:</label>
        <input type="text" name="last_name" value="<?= $patient['last_name'] ?? '' ?>" required>
    </div>
    
    <div class="form-group">
        <label>Имя:</label>
        <input type="text" name="first_name" value="<?= $patient['first_name'] ?? '' ?>" required>
    </div>
    
    <div class="form-group">
        <label>Отчество:</label>
        <input type="text" name="patronymic" value="<?= $patient['patronymic'] ?? '' ?>">
    </div>
    
    <div class="form-group">
        <label>Пол:</label>
        <select name="gender_id" required>
            <?php while($gender = $genders->fetch_assoc()): ?>
            <option value="<?= $gender['id'] ?>" 
                <?= ($patient['gender_id'] ?? '') == $gender['id'] ? 'selected' : '' ?>>
                <?= $gender['name'] ?>
            </option>
            <?php endwhile; ?>
        </select>
    </div>
    
    <div class="form-group">
        <label>Дата рождения:</label>
        <input type="date" name="date_of_birth" 
               value="<?= $patient['date_of_birth'] ?? '' ?>" required>
    </div>
    
    <div class="form-group">
        <label>Группа крови:</label>
        <select name="blood_type_id">
            <option value="">Не указана</option>
            <?php while($type = $blood_types->fetch_assoc()): ?>
            <option value="<?= $type['id'] ?>" 
                <?= ($patient['blood_type_id'] ?? '') == $type['id'] ? 'selected' : '' ?>>
                <?= $type['type'] ?>
            </option>
            <?php endwhile; ?>
        </select>
    </div>
    
    <div class="form-group">
        <label>Телефон:</label>
        <input type="tel" name="phone" 
               value="<?= $patient['phone'] ?? '' ?>" required>
    </div>
    
    <button type="submit" class="btn">Сохранить</button>
</form>

<?php require_once '../../includes/footer.php'; ?>