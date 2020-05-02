<?php


if (isset($_GET['logout'])) {
    require_once '../log_in_out.php';
    $log_chk = new Log_in_out();
    $log_chk->log_out('logout');
}
?>
<?php
    $page='pages/add_student_info.php';
    include 'index.php';
?>
