<?php
$db = new mysqli('localhost', 'root', '', '');

if ($db->connect_error) die("Ошибка подключения: " . $db->connect_error);

if (!$db->query("DROP DATABASE IF EXISTS medical_cooperative")) {
    die("Ошибка удаления БД: " . $db->error);
}
?>
<p class="status-text-db"> База данных удалена! </p>
<?php $db->close(); ?>