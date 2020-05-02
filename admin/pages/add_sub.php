<?php
    $message="";
    if(isset($_POST['btn'])){
        require_once 'db/db_connection.php';
        $db_conn=new DB_connection();
        $message=$db_conn->add_subject($_POST);
        
        }
?>
<h2 align="center" style="color:green"><?Php echo $message;?></h2>            
<form action="" method="POST">
    <fieldset>
        <legend> Student Entry </legend>

                <table>
                    <tr>
                        <td>Subject Code:</td>
                        <td><input type="text" name="sub_code" size="60"></td>
                    </tr>
                    <tr>
                        <td>Subject Name:</td>
                        <td><input type="text" name="sub_name" size="60"></td>
                    </tr>
                    <tr>
                        <td>Credit:</td>
                        <td><input type="text" name="credit" size="60"></td>
                    </tr>
                    <tr>
                <td>Semester</td>
                <td>
                    <select name="semester">
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
                        <td></td>
                        <td>
                            <input type="submit" name="btn" value="Submit">
                        </td>
                    </tr>
                </table>
    </fieldset>
</form>


