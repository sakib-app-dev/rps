<?php
    require_once 'db/db_connection.php';
    $db_conn=new DB_connection();
    $query_result=$db_conn->view_student_info();
?>

<table border="1" cellspacing="0" width="100%" align="center">
    <tr>
        <th>Student Id</th>
        <th>Student Name</th>
        <th>Email</th>
        <th>Phone No</th>
        <th>Address</th>
        <th>Gender</th>
        <th>Date of Birth</th>
        <th>Session</th>
        <th>Depertment</th>
        <th>Action</th>
    </tr>
    <?php while($student_info=mysqli_fetch_assoc($query_result)){ ?>
    <tr align="center">
        <td><?php echo $student_info['student_id'];?></td>
        <td><?php echo $student_info['student_name'];?></td>
        <td><?php echo $student_info['email'];?></td>
        <td><?php echo $student_info['phone'];?></td>
        <td><?php echo $student_info['address'];?></td>
        <td><?php echo $student_info['gender'];?></td>
        <td><?php echo $student_info['date_of_birth'];?></td>
        <td><?php echo $student_info['session'];?></td>
        <td><?php echo $student_info['dept'];?></td>
        
        <td>
            <a href="edit_info.php?id=<?php echo $student_info['student_id'];?>"><input type="submit" name="edit" value="Edit"></a>
            <a href="pages/goto/delete_info.php"><input type="submit" name="delete" value="Delete"></a>
        </td>
    <?php } ?> 
    </tr>
</table>


