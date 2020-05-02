<?php


class DB_connection {
    protected $connection;
    public function __construct() {
        $host='localhost';
        $user='root';
        $pswd='';
        $db_name='rps';
        
        $this->connection = mysqli_connect($host,$user,$pswd,$db_name);
        if(!$this->connection){
            die("Connection Failed". mysqli_error($this->connection));
        }
    }

    public function add_student_info($data){
        
        
        
        $sql="INSERT INTO student_info (student_id,student_name,email,phone,address,gender,date_of_birth,image,session,dept) VALUES ('$data[id]','$data[name]','$data[email]','$data[phn]','$data[address]','$data[gender]','$data[date]','$data[$target_file1]','$data[session]','$data[dept]')";
        if(mysqli_query($this->connection, $sql)){
            header('Location:view_student.php');
            $message="Saved Successfully";
            return $message;
        }else{
            die("Query Problem".mysqli_error($this->connection));
        }
    }
    
    public function view_student_info(){
        $sql="SELECT * FROM student_info";
        if(mysqli_query($this->connection, $sql)){
            $query_result=mysqli_query($this->connection,$sql);
            return $query_result;
            
        }else{
            die("Query Problem".mysqli_error($this->connection));
        }
    }
    
    public function edit_student_info($student_id){
        $sql="SELECT * FROM student_info where student_id='$student_id'";
        if(mysqli_query($this->connection, $sql)){
            $query_result=mysqli_query($this->connection,$sql);
            return $query_result;
        }else{
            die("Query Problem".mysqli_errno($this->connection));
        }
    }
    
    
    public function update_student_info($data){
        $sql="UPDATE student_info SET student_id='$data[id]',student_name='$data[name]',email='$data[email]',phone='$data[phn]',address='$data[address]',gender='$data[gender]',date_of_birth='$data[date]',image='$data[img]',session='$data[session]',dept='$data[dept]' WHERE student_id='$data[id]'";
        if(mysqli_query($this->connection, $sql)){
            session_start();
            $SESSION['message']="Update Successfully";
            header('Location:view_student.php');
            $query_result=mysqli_query($this->connection,$sql);
            return $query_result;
            $message="Info Updated";
            return $message;
        }else{
            die("Query Problem".mysqli_error($this->connection));
        }
    }
    
    public function delete_student_info($id){
        $sql="DELETE FROM student-info WHERE student-id='$id'";
        if(mysqli_query($this->connection, $sql)){
            $message="Delect Successfully";
            return $message;
        }else{
            die("Query Problem".mysqli_error($this->connection));
        }
    }


    public function add_subject($data){
        
        $sql="INSERT INTO subject (subject_code,subject_name,credit,semester) VALUES ('$data[sub_code]','$data[sub_name]','$data[credit]','$data[semester]')";
        if(mysqli_query($this->connection, $sql)){
            header('Location:view_sub.php');
            $message="Saved Successfully";
            return $message;
        }else{
            die("Query Problem".mysqli_error($this->connection));
        }
    }
    
    public function view_subject(){
        $sql="SELECT * FROM subject";
        if(mysqli_query($this->connection, $sql)){
            $query_result=mysqli_query($this->connection,$sql);
            return $query_result;
            
        }else{
            die("Query Problem".mysqli_error($this->connection));
        }
    }
    
    public function result_entry_assignment($data){
        $sqry="SELECT student_id FROM student_info where student_id='$data[id]'";
        $qry=mysqli_query($this->connection, $sqry);
        $row=mysqli_fetch_assoc($qry);
        $id=$row['student_id'];
        
        $sub_sqry="SELECT * FROM subject where subject_code='$data[sub_code]'";
        $sub_qry=mysqli_query($this->connection, $sub_sqry);
        $sub_row=mysqli_fetch_assoc($sub_qry);
        $sub_id=$sub_row['subject_code'];
//        echo '<pre>';
//        print_r($sub_id);
//        exit();
    if ($data['id'] == $id && $data['session'] == $row['session'] && $data['dept'] == $row['dept'] && $data['semester'] == $sub_row['semester'] && $data['sub_code'] == $sub_id) {
            $sql = "INSERT INTO assignment (student_id,session,dept,semester,subject_code,marks) VALUES ('$data[id]','$data[session]','$data[dept]','$data[semester]','$data[sub_code]','$data[marks]')";
            if (mysqli_query($this->connection, $sql)) {
                $message = "Saved Successfully";
                return $message;
            } else {
                die("Query Problem" . mysqli_error($this->connection));
            }
        } else {
            $message = "Wrong Student Id";
            return $message;
        }
    }
    public function result_entry_ct($data){
        $sqry="SELECT student_id FROM student_info where student_id='$data[id]'";
        $qry=mysqli_query($this->connection, $sqry);
        $row=mysqli_fetch_assoc($qry);
        $id=$row['student_id'];
        
        $sub_sqry="SELECT * FROM subject where subject_code='$data[sub_code]'";
        $sub_qry=mysqli_query($this->connection, $sub_sqry);
        $sub_row=mysqli_fetch_assoc($sub_qry);
        $sub_id=$sub_row['subject_code'];
//        echo '<pre>';
//        print_r($sub_id);
//        exit();
    if ($data['id'] == $id && $data['session']==$row['session'] && $data['dept']==$row['dept'] && $data['semester']==$sub_row['semester'] && $data['sub_code']==$sub_id) {
            $sql = "INSERT INTO class_test (student_id,session,dept,semester,subject_code,marks) VALUES ('$data[id]','$data[session]','$data[dept]','$data[semester]','$data[sub_code]','$data[marks]')";
            if (mysqli_query($this->connection, $sql)) {
                $message = "Saved Successfully";
                return $message;
            } else {
                die("Query Problem" . mysqli_error($this->connection));
            }
        } else {
            $message = "Wrong Student Id";
            return $message;
        }
    }
    public function result_entry_midterm($data){
        $sqry="SELECT student_id FROM student_info where student_id='$data[id]'";
        $qry=mysqli_query($this->connection, $sqry);
        $row=mysqli_fetch_assoc($qry);
        $id=$row['student_id'];
        
        $sub_sqry="SELECT * FROM subject where subject_code='$data[sub_code]'";
        $sub_qry=mysqli_query($this->connection, $sub_sqry);
        $sub_row=mysqli_fetch_assoc($sub_qry);
        $sub_id=$sub_row['subject_code'];
//        echo '<pre>';
//        print_r($sub_id);
//        exit();
    if ($data['id'] == $id && $data['session']==$row['session'] && $data['dept']==$row['dept'] && $data['semester']==$sub_row['semester'] && $data['sub_code']==$sub_id) {
            $sql = "INSERT INTO mid_term (student_id,session,dept,semester,subject_code,marks) VALUES ('$data[id]','$data[session]','$data[dept]','$data[semester]','$data[sub_code]','$data[marks]')";
            if (mysqli_query($this->connection, $sql)) {
                $message = "Saved Successfully";
                return $message;
            } else {
                die("Query Problem" . mysqli_error($this->connection));
            }
        } else {
            $message = "Wrong Student Id";
            return $message;
        }
    }
    public function finalXm($data){
        $sqry="SELECT * FROM student_info where student_id='$data[id]'";
        $qry=mysqli_query($this->connection, $sqry);
        $row=mysqli_fetch_assoc($qry);
        $id=$row['student_id'];
        
        $sub_sqry="SELECT * FROM subject where subject_code='$data[sub_code]'";
        $sub_qry=mysqli_query($this->connection, $sub_sqry);
        $sub_row=mysqli_fetch_assoc($sub_qry);
        $sub_id=$sub_row['subject_code'];
//        echo '<pre>';
//        print_r($sub_id);
//        exit();
    if ($data['id'] == $id && $data['session']==$row['session'] && $data['dept']==$row['dept'] && $data['semester']==$sub_row['semester'] && $data['sub_code']==$sub_id) {
            $sql = "INSERT INTO final_xm (student_id,session,dept,semester,subject_code,marks) VALUES ('$data[id]','$data[session]','$data[dept]','$data[semester]','$data[sub_code]','$data[marks]')";
            if (mysqli_query($this->connection, $sql)) {
                $message = "Saved Successfully";
                return $message;
            } else {
                die("Query Problem" . mysqli_error($this->connection));
            }
        } else {
            $message = "Wrong information";
            return $message;
        }
    }

    
    
}
?>
