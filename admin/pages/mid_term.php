<?php
$message='';
    if(isset($_POST['btn'])){
        require_once 'db/db_connection.php';
        $db_conn=new DB_connection();
        $message=$db_conn->result_entry_midterm($_POST);
        }
?>
<h2 align="center" style="color: green; font-size:30px;"><?php echo $message;?></h2>
<form action="" method="post">
    <fieldset>
        <legend align="center">Mid-term Exam</legend>
        <table align="center" width="30%">
            <tr>
                <td>Student ID:</td>
                <td><input type="text" name="id" required=""></td>
            </tr>
            <tr>
                <td>Session</td>
                <td><input type="text" name="session" required=""></td>
            </tr>
            <tr>
                <td>Depertment</td>
                <td>
                    <select name="dept" required="">
                        <option selected disabled>Select..</option>
                        <option value="CSE">CSE</option>
                        <option value="BBA">BBA</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Semester</td>
                <td>
                    <select name="semester" required="">
                        <option selected disabled>Select..</option>
                        <option value="1st Semester">1st Semester</option>
                        <option value="2nd Semester">2nd Semester</option>
                        <option value="3rd Semester">3rd Semester</option>
                        <option value="4th Semester">4th Semester</option>
                        <option value="5th Semester">5th Semester</option>
                        <option value="6th Semester">6th Semester</option>
                        <option value="7th Semester">7th Semester</option>
                        <option value="8th Semester">8th Semester</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Subject Code:</td>
                <td><input type="text" name="sub_code" required=""></td>
            </tr>
            <tr>
                <td>Marks:</td>
                <td><input type="text" name="marks" required=""></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="btn" value="submit"></td>
            </tr>
            
    </fieldset>
</form>