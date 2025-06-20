<?php
$db = new mysqli('localhost', 'kirill', '1234', 'medical_cooperative');

if ($db->connect_error) die("Ошибка подключения: " . $db->connect_error);

if (!$db->query("DROP DATABASE IF EXISTS medical_cooperative")) {
    die("Ошибка удаления БД: " . $db->error);
}
?>
<p class="status-text-db"> База данных удалена! </p>
<?php $db->close(); ?>