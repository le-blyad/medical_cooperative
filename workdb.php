<?php
require_once 'includes/header.php';
?>

<div class="button-container">
    <form method="post">
        <button type="submit" name="install" class="action-button install">
            Установить базу данных
        </button>
    </form>
    <form method="post">
        <button type="submit" name="uninstall" class="action-button uninstall">
            Удалить базу данных
        </button>
    </form>
</div>

<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['install'])) {
    include 'install.php';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['uninstall'])) {
    include 'uninstall.php';
}
?>

<?php
require_once 'includes/footer.php';
?>