<?php
    require_once 'db/db_connection.php';
    $db_conn=new DB_connection();
    $query_result=$db_conn->view_subject();
?>

<table border="1" cellspacing="0" width="100%" align="center">
    <tr>
        <th>Subject Code</th>
        <th>Subject Name</th>
        <th>Credit</th>
        <th>Semester</th>
    </tr>
    <?php while($sub_info=mysqli_fetch_assoc($query_result)){ ?>
    <tr align="center">
        <td><?php echo $sub_info['subject_code'];?></td>
        <td><?php echo $sub_info['subject_name'];?></td>
        <td><?php echo $sub_info['credit'];?></td>
        <td><?php echo $sub_info['semester'];?></td>
    </tr>    
    <?php } ?> 
    
</table>

