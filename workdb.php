<?php
require_once 'includes/header.php';
?>

    <div class="main-statusdb">
        <div class="statusdb">
                <h2>Что сделать с Базой данных?</h2>
                <div class="button-container">
                    <form method="post">
                        <button type="submit" name="install" class="action-button install">
                            Установить
                        </button>
                    </form>
                    <form method="post">
                        <button type="submit" name="uninstall" class="action-button uninstall">
                            Удалить
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
        </div>
    </div>

<?php
require_once 'includes/footer.php';
?>