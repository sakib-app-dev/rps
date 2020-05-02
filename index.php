<?php
session_start();
$calculation='';
$msg='';

if(isset($_SESSION['admin_id'])){
    if($_SESSION!=NULL){
        header('Location:admin/index.php');
    }
}
require_once './log_in_out.php';
$log_chk=new Log_in_out();

if (isset($_POST['btn'])) {
    $calculation = $log_chk->result_processing($_POST);
}
if(isset($_POST['button'])){
    $msg=$log_chk->log_in_check($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Home Page</title>

    <!-- Bootstrap core CSS -->
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">RPS</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <form action="" method="POST" class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" name="admin_name" placeholder="Admin Name" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" class="form-control">
            </div>
              <button type="submit" name="button" class="btn btn-success">Log in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
          <div class="row">
              <div class="12">
                  <h1 class="text-center"><img src="admin/images/logo.png"> MIST Result Processing System</h1>
              </div>
          </div>
          <div></div>
          
      </div>
    </div>
    <!-- msg show of error for log in -->
    
        <h2><?php echo $msg;?></h2>
        <?php if (isset($_POST['btn'])) { ?>
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <div class="well" style="margin-top: 5px; padding: 65px;">

                        <h2 class="text text-center text-uppercase text-primary">
                            <b>
                                <?php
                                if ($calculation >= 2.00) {
                                    echo $_SESSION['semester'] . ' ' . 'Result';

                                    echo '<h3 class="text text-success text-center">Congratulation-</h3>' . $_SESSION['name'];
                                    echo '<br/><h4 class="text text-success text-center"> Your Result is GPA:</h4>' . $calculation;
                                    unset($_SESSION['semester']);
                                    unset($_SESSION['name']);
                                } else {
                                    echo $calculation;
                                }
                                ?>
                            </b>
                        </h2>
                    </div>
                </div>
            </div>
        <?php } ?>
    
    
    <!-- Result Search-->
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-offset-2 col-md-8">
                  <div class="well" style="margin-top: 5px; padding: 65px;">
                      <h3 class="text-center text-primary">Search Result</h3>
                      <form class="form-horizontal" action="" method="POST">
                          <div class="form-group">
                              <label class="control-label col-md-3">Student Id No:</label>
                              <div class="col-md-8">
                                  <input type="number" name="id" required="" class="form-control">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="control-label col-md-3">Session:</label>
                              <div class="col-md-8">
                                  <input type="text" name="session" required="" class="form-control">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="control-label col-md-3" for="sel1">Dept:</label>
                              <div class="col-md-8">
                                  <select name="dept" class="form-control" id="sel1" required="">
                                      <option selected="" disabled="">Select..</option>
                                      <option value="CSE">CSE</option>
                                      <option value="BBA">BBA</option>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="control-label col-md-3" for="sel1">Semester:</label>
                              <div class="col-md-8">
                                  <select name="semester" class="form-control" id="sel1" required="">
                                      <option selected="" disabled="">Select..</option>
                                      <option value="1st Semester">1st Semester</option>
                                      <option value="2nd Semester">2nd Semester</option>
                                      <option value="3rd Semester">3rd Semester</option>
                                      <option value="4th Semester">4th Semester</option>
                                      <option value="5th Semester">5th Semester</option>
                                      <option value="6th Semester">6th Semester</option>
                                      <option value="7th Semester">7th Semester</option>
                                      <option value="8th Semester">8th Semester</option>
                                  </select>
                              </div>
                          </div>
                          
                          
                          <div class="form-group">
                              
                              <div class="col-md-offset-3 col-md-8">
                                  <input type="submit" name="btn" required="" class="btn btn-primary btn-block">
                              </div>
                          </div>
                        
                          
                      </form>
                      
                  </div>
              </div>
      </div>

                   
      <hr>
      <footer>
        <p align="center">&copy;2018 Sakib Ahamed.</p>
      </footer>
    </div> 
    <script src="asset/js/jquery.min.js"></script>
    
  </body>
</html>
