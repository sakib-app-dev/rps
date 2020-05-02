<?php error_reporting(0);?>
<?php
session_start();
if($_SESSION['admin_id']==NULL){
    header('Location:../index.php');
}
if (isset($_GET['logout'])) {
    require_once '../log_in_out.php';
    $log_chk = new Log_in_out();
    $log_chk->log_out();
}
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Result Processing System</title>
        <link rel="icon" href="images/logo.png" type="image/gif">
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body>
        <?php include 'layout/header.php';?>
        <?php include 'layout/menu.php';?>
        
        <?php 
            $page;
            if($page){
                if($page=='pages/home.php'){
                    include 'pages/home.php';
                }
                elseif($page=='pages/add_student_info.php'){
                    include 'pages/add_student_info.php';
                }
                elseif($page=='pages/view_student_info.php'){
                    include 'pages/view_student_info.php';
                }
                elseif($page=='pages/edit_info.php'){
                    include 'pages/edit_info.php';
                }
                elseif($page=='pages/assignment.php'){
                    include 'pages/assignment.php';
                }
                elseif($page=='pages/class_test.php'){
                    include 'pages/class_test.php';
                }
                elseif($page=='pages/mid_term.php'){
                    include 'pages/mid_term.php';
                }
                elseif($page=='pages/final_exam.php'){
                    include 'pages/final_exam.php';
                }
                elseif($page=='pages/view_result.php'){
                    include 'pages/view_result.php';
                }
                elseif($page=='pages/student_result.php'){
                    include 'pages/student_result.php';
                }
                elseif($page=='pages/add_sub.php'){
                    include 'pages/add_sub.php';
                }
                elseif($page=='pages/view_sub.php'){
                    include 'pages/view_sub.php';
                }
                elseif($page=='pages/student_result.php'){
                    include 'pages/student_result.php';
                }
                elseif($page=='pages/notice.php'){
                    include 'pages/notice.php';
                }
                elseif($page=='pages/contact_us.php'){
                    include 'pages/contact_us.php';
                }
            }
        ?>
        
        <?php include 'layout/footer.php';?>
    </body>
</html>
