<?php
$db = new mysqli('localhost', 'root', '', '');

if ($db->connect_error) die("Ошибка подключения: " . $db->connect_error);

if (!$db->query("CREATE DATABASE IF NOT EXISTS medical_cooperative CHARACTER SET utf8mb4")) {
    die("Ошибка создания БД: " . $db->error);
}

$db->select_db('medical_cooperative');

$sql = file_get_contents('medical_cooperative.sql');
if (!$db->multi_query($sql)) {
    die("Ошибка импорта SQL: " . $db->error);
}
?>
<p class="status-text-db"> Установка завершена! </p>
<?php $db->close(); ?>