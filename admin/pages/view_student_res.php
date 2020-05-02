<?php
    require_once 'db/db_connection.php';
    $db_conn=new DB_connection();
    $query_result=$db_conn->view_student_info();
?>

<table border="1" cellspacing="0" width="100%" align="center">
    <tr>
        <th>Semeter</th>
        <th>cgpa</th>
        <th>cgpa</th>
        <th>cgpa</th>
        <th>cgpa</th>
        <th>cgpa</th>
        <th>cgpa</th>
        <th>cgpa</th>
        <th>cgpa</th>
    </tr>
    <?php $i=1; while($sem_res=mysqli_fetch_assoc($query_result)){ ?>
    <tr align="center">
        <td><?php echo "Semester";$i++ ;?></td>
        <td><?php echo $sem_res[''];?></td>
        <td><?php echo $sem_res[''];?></td>
        <td><?php echo $sem_res[''];?></td>
        <td><?php echo $sem_res[''];?></td>
        <td><?php echo $sem_res[''];?></td>
        <td><?php echo $sem_res[''];?></td>
        <td><?php echo $sem_res[''];?></td>
        <td><?php echo $sem_res[''];?></td>>
        
    <?php } ?> 
    </tr>
</table>


