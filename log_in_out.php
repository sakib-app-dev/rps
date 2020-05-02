<?php

class Log_in_out {
    protected $connection;

    public function __construct() {
        $host = 'localhost';
        $user = 'root';
        $pswd = '';
        $db_name = 'rps';

        $this->connection = mysqli_connect($host, $user, $pswd, $db_name);
        if (!$this->connection) {
            die("Connection Failed" . mysqli_error($this->connection));
        }
    }
    
    public function result_processing($data){
        session_start();
        
        $src_nam= mysqli_query($this->connection,"SELECT * FROM student_info WHERE '$data[id]'=student_id");
        $nam_row= mysqli_fetch_assoc($src_nam);//session e nam newar jonno
        
        //---------Calculation Result---------
        $ass_avg=mysqli_query($this->connection,("SELECT AVG(marks)FROM assignment WHERE student_id='$data[id]' AND session='$data[session]' AND dept='$data[dept]' AND semester='$data[semester]'"));
        $ass_row= mysqli_fetch_assoc($ass_avg);
        $ass=$ass_row['AVG(marks)'];
        
        $cls_avg=mysqli_query($this->connection,("SELECT AVG(marks)FROM class_test WHERE student_id='$data[id]' AND session='$data[session]' AND dept='$data[dept]' AND semester='$data[semester]'"));
        $cls_row= mysqli_fetch_assoc($cls_avg);
        $cls=$cls_row['AVG(marks)'];
        
        $mid_avg=mysqli_query($this->connection,("SELECT AVG(marks)FROM mid_term WHERE student_id='$data[id]' AND session='$data[session]' AND dept='$data[dept]' AND semester='$data[semester]'"));
        $mid_row= mysqli_fetch_assoc($mid_avg);
        $mid=$mid_row['AVG(marks)'];
        
        
        $extra_res=(($ass+$cls+$mid)*20)/100;
        
        $final_avg=mysqli_query($this->connection,("SELECT AVG(marks)FROM mid_term WHERE student_id='$data[id]' AND session='$data[session]' AND dept='$data[dept]' AND semester='$data[semester]'"));
        $final_row= mysqli_fetch_assoc($final_avg);
        $final=$final_row['AVG(marks)'];
        
        $total_res=$final+$extra_res;
        switch ($total_res) {
            case(100>=80):
                $calculation ='4.00';
                break;
            case(79>=75):
                $calculation ='3.75';
                break;
            case(74>=70):
                $calculation ='3.50';
                break;
            case(69>=65):
                $calculation ='3.00';
                break;
            case(64>=60):
                $calculation ='2.75';
                break;
            case(60>=50):
                $calculation ='2.50';
                break;
            case(49>=40):
                $calculation ='2.00';
                break;
            default:
                $calculation ='<h2 align="center" style="color:red">Sorry..You Are failed</h2>';
                break;
        }
        $_SESSION['semester']=$data['semester'];
        $_SESSION['name']=$nam_row['student_name'];
        return $calculation;
        
            
                         
        
//        echo '<pre>';
//        print_r($calculation);
//        exit();
        
        //$name=$nam_row['student_name'];
        
        
        
//        echo '<pre>';
//        print_r($_SESSION['name']);
//        exit();
        if(mysqli_query($this->connection, $sql)){
            $query_result=mysqli_query($this->connection,$sql);
            return $query_result;
            
        }else{
            die("Query Problem".mysqli_error($this->connection));
        }
    }
    
    public function log_in_check($data){
        $password=md5($data['password']);
        $sql="SELECT*FROM admin WHERE admin_name='$data[admin_name]' AND password='$password'";
        $query_result=mysqli_query($this->connection, $sql);
        $admin_info=mysqli_fetch_assoc($query_result);
//        echo '<pre>';
//        print_r($admin_info);
//        exit();
        if($admin_info){
            session_start();
            $_SESSION['admin_id']=$admin_info['admin_id'];
            header('Location:admin/index.php');
            
                          
        }else{
            $msg='<div class="alert alert-danger text text-center">User name or password are not valid...!</div>';
            return $msg;
        }
        
        
        if(mysqli_query($this->connection, $sql)) {
            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;
        } else {
            die("Query Problem" . mysqli_error($this->connection));
        }
    }
    
    public function log_out(){
        unset ($_SESSION['admin_id']);
        header('Location: ../index.php');
    }
    
//    public function res_cal($data){
//        
//        $ass_avg=mysqli_query($this->connection,("SELECT * FROM assignment WHERE student_id='$data[id]' AND session='$data[session]' AND dept='$data[dept]' AND semester='$data[semester]'"));
//        
//        $ass_row= mysqli_fetch_assoc($ass_avg);
//        $ass=$ass_row['subject_code'];
//        
//        $sub_sql="SELECT * FROM subject WHERE subject_code=$ass";
//        $sub_row=mysqli_fetch_assoc($sub_sql);
//        echo '<pre>';
//        print_r($sub_row);
//        exit();
//    }

}
