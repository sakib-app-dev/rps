<?php
    $student_id=$_GET['id'];
    //echo $student_id;
    require_once 'db/db_connection.php';
    $db_conn=new DB_connection();
    $query_result=$db_conn->edit_student_info($student_id);
    $student_info=mysqli_fetch_assoc($query_result);
    
    if(isset($_POST['btn'])){
        $db_conn->update_student_info($_POST);
    }
    
?>



<form action="" method="POST">
        <fieldset>
        <legend> Student Entry </legend>

                <table>
                    <tr>
                        <td>Student's ID No:</td>
                        <td><input type="number" name="id" value="<?php echo $student_info['student_id'];?>" size="60"></td>
                    </tr>
                    <tr>
                        <td>Student's Name:</td>
                        <td><input type="text" name="name" value="<?php echo $student_info['student_name'];?>" size="60"></td>
                    </tr>
                    <tr>
                        <td>Student's Email No:</td>
                        <td><input type="email" name="email" value="<?php echo $student_info['email'];?>" size="60"></td>
                    </tr>
                    <tr>
                        <td>Phone No:</td>
                        <td><input type="number" name="phn" value="<?php echo $student_info['phone'];?>" size="60"></td>
                    </tr>
                    <tr>
                        <td>Address:</td>
                        <td><textarea name ="address" size="60"><?php echo $student_info['address'];?></textarea></td>
                    </tr>
                    <tr>
                        <td>Gender:</td>
                        <td>
                            <select name="gender"  value="<?php echo $student_info['gender'];?>">
                                <option selected="" disabled="">Select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Date of Birth:</td>
                        <td><input type="date" name="date" value="<?php echo $student_info['date_of_birth'];?>" size="60"></td>
                    </tr>
                    <tr>
                        <td>Session:</td>
                        <td><input type="text" name="session" value="<?php echo $student_info['session'];?>" size="60"></td>
                    </tr>
                    <tr>
                        <td>Deparment:</td>
                        <td>
                            <select name="dept" value="<?php echo $student_info['dept'];?>" >
                                <option selected="" disabled="">Select</option>
                                <option value="CSE">CSE</option>
                                <option value="BBA">BBA</option>
                            </select>
                        </td>
                    </tr>
                    
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="btn" value="UPDATE Info">
                        </td>
                    </tr>
                </table>
        </fieldset>
    </form>

