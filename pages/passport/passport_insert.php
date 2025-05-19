<?php
require_once '../../includes/header.php';
require_once '../../includes/config.php';

$series = $conn->query("SELECT id, series FROM passport");
$number = $conn->query("SELECT id, number FROM passport");
$issued_by_whom = $conn->query("SELECT id, issued_by_whom FROM passport");
?>

<h2>Добавить паспорт</h2>
<form method="POST" action="pages/passport/passport_insert_post.php">

    <div class="form-group">
        <label>Серия:</label>
        <input type="int" name="series" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Номер:</label>
        <input type="int" name="number" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Кем выдан:</label>
        <input type="text" name="issued_by_whom" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Добавить</button>
</form>

<?php require_once '../../includes/footer.php'; ?>