
<?php
    $message="";
    if(isset($_POST['btn'])){
        require_once 'db/db_connection.php';
        $db_conn=new DB_connection();
        $message=$db_conn->add_student_info($_POST);
        
        }
?>

<h2 align="center" style="color:green"><?Php echo $message;?></h2>            
<form action="" method="POST">
        <fieldset>
        <legend> Student Entry </legend>

                <table>
                    <tr>
                        <td>Student's ID No:</td>
                        <td><input type="number" name="id" size="60"></td>
                    </tr>
                    <tr>
                        <td>Student's Name:</td>
                        <td><input type="text" name="name" size="60"></td>
                    </tr>
                    <tr>
                        <td>Student's Email No:</td>
                        <td><input type="email" name="email" size="60"></td>
                    </tr>
                    <tr>
                        <td>Phone No:</td>
                        <td><input type="number" name="phn" size="60"></td>
                    </tr>
                    <tr>
                        <td>Address:</td>
                        <td><textarea name ="address" ></textarea></td>
                    </tr>
                    <tr>
                        <td>Gender:</td>
                        <td>
                            <select name="gender">
                                <option selected="" disabled="">Select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Date of Birth:</td>
                        <td><input type="date" name="date" size="60"></td>
                    </tr>
                    <tr>
                        <td>Session:</td>
                        <td><input type="text" name="session" size="60"></td>
                    </tr>
                    <tr>
                        <td>Deparment:</td>
                        <td>
                            <select name="dept">
                                <option selected="" disabled="">Select</option>
                                <option value="CSE">CSE</option>
                                <option value="BBA">BBA</option>
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
