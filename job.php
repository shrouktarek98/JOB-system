<?php
if (isset($_POST['job'])) {
  @session_start();
  $username_login=$_POST['username_login'];
  $password_login=$_POST['password_login'];
  if($username_login=="admin"&&$password_login=="admin"){
     $_SESSION["admin"]="yes";
  }
  else{
    $_SESSION["admin"]="no";
  }

  $_SESSION['login']="no";
  $_SESSION['login_seeker']="";
  $_SESSION['login_provider']="";

  $conn = mysqli_connect('localhost', "root", "","jobs");
  $bool=true;
  $sql='select * from jobseceer';
  $table= mysqli_query( $conn , $sql );
  echo $username_login."<br>";
  while($row = mysqli_fetch_array($table)){
      if($row['username']==$username_login and $row['passwordd']==$password_login){
        if($row['block']=='no'){
          $_SESSION['login_seeker']=$row;
          break;
        }
        
          
      }
  }
  $sql='select * from jobprovider';
  $table= mysqli_query( $conn , $sql );
  while($row = mysqli_fetch_array($table)){
      if($row['username']==$username_login and $row['passwordd']==$password_login){
            $_SESSION['login_provider']=$row;
          break;
      }
  }
  if($_SESSION['login_seeker']!=""){
    
    header("Location:job-seeker.php");
  }
  elseif($_SESSION['login_provider']!=""){
    header("Location:job_provider.php");
  }
  elseif($_SESSION['admin']=="yes"){
    header("Location:admin.php");
  }
  else{
    $_SESSION['login']="yes";
    header("Location:login.php");
  }
}
else{
  $_SESSION['login']="";
  header("Location:login.php");
}
?>

<script src='assets/js/jquery-3.3.1.js'></script>
<script src='assets/js/register-job.js'></script>