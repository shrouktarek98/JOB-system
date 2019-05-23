
<?php
if(isset($_POST['rejesterjobprovider'])){
     
    session_start();
    $username_provider=$_POST['username_provider'];
    $array['username_provider']=[$username_provider,"no"];

    $email_provider=$_POST['email_provider'];
    $array['email_provider']=[$email_provider,"no"];

    $password_provider=$_POST['password_provider'];
    $array['password_provider']=[$password_provider,"no"];

    $confirmpass_provider=$_POST['confirmpass_provider'];
    $array['confirmpass_provider']=[$confirmpass_provider,"no"];
    

    
   
    $_SESSION['arrprovider']=$array;

    $conn = mysqli_connect('localhost', "root", "","jobs");
    $bool=true;

    if(strlen($username_provider)<=2){
        $_SESSION['arrprovider']['username_provider']=[$username_provider,"yes"];
        $bool=false;
    }
    
    $sql='select * from jobprovider';
    $table=mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($table)){
        if($row['username']==$username_provider){
            $_SESSION['arrprovider']['username_provider']=[$username_provider,"yes"];
            $bool=false;
        }
    }
    $sql='select * from jobseceer';
    $table=mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($table)){
        if($row['username']==$username_provider){
            $_SESSION['arrprovider']['username_provider']=[$username_provider,"yes"];
            $bool=false;
        }
    }
    if($email_provider==""){
        $_SESSION['arrprovider']['email_provider']=[$email_provider,"yes"];
            $bool=false;
    }
    if($password_provider=="" or $password_provider!=$confirmpass_provider){
        $_SESSION['arrprovider']['password_provider']=[$password_provider,"yes"];
            $bool=false;
    }
    if($confirmpass_provider=="" or $password_provider!=$confirmpass_provider){
        $_SESSION['arrprovider']['confirmpass_provider']=[$confirmpass_provider,"yes"];
            $bool=false;
    }
    
    if($bool==false){
         header("Location:register-job-provider.php");
    }
    else{
        
        $sql="insert into jobprovider(username,email,passwordd,confirmpassword) values 
          ('$username_provider','$email_provider','$password_provider','$confirmpass_provider') ";
          mysqli_query($conn,$sql);
          $_SESSION['arrprovider']="";
          header("Location:login.php");
    }
}















elseif(isset($_POST['rejesterjobseceer'])){
    session_start();
    $username_seeker=$_POST['username_seeker'];
    $array['username_seeker']=[$username_seeker,"no"];

    $email_seeker=$_POST['email_seeker'];
    $array['email_seeker']=[$email_seeker,"no"];

    $password_seeker=$_POST['password_seeker'];
    $array['password_seeker']=[$password_seeker,"no"];

    $confirmpass_seeker=$_POST['confirmpass_seeker'];
    $array['confirmpass_seeker']=[$confirmpass_seeker,"no"];
    

    $career_seeker=$_POST['career_seeker'];
    $array['career_seeker']=[$career_seeker,"no"];

    $phone_seeker=$_POST['phone_seeker'];
    $array['phone_seeker']=[$phone_seeker,"no"];

    $data_seeker=$_POST['data_seeker'];
    $array['data_seeker']=[$data_seeker,"no"];

    $graduate_seeker=$_POST['graduate_seeker'];

    $image_seeker=$_FILES['image_seeker']['tmp_name'];
    if($_FILES['image_seeker']['size']>0){
        echo $_FILES['image_seeker']['size'];  
        $image_seeker = addslashes( file_get_contents ($image_seeker));
        $array['image_seeker']=[$_FILES['image_seeker']['tmp_name'],"no"];
    }
    $_SESSION['arrseeker']=$array;

    $conn = mysqli_connect('localhost', "root", "","jobs");
    $bool=true;

    if(strlen($username_seeker)<=2){
        $_SESSION['arrseeker']['username_seeker']=[$username_seeker,"yes"];
        $bool=false;
    }
    $sql='select * from jobseceer';
    $table=mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($table)){
        if($row['username']==$username_seeker){
            $_SESSION['arrseeker']['username_seeker']=[$username_seeker,"yes"];
            $bool=false;
        }
    }
    $sql='select * from jobprovider';
    $table=mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($table)){
        if($row['username']==$username_seeker){
            $_SESSION['arrseeker']['username_seeker']=[$username_seeker,"yes"];
            $bool=false;
        }
    }
    
    if($email_seeker==""){
        $_SESSION['arrseeker']['email_seeker']=[$email_seeker,"yes"];
            $bool=false;
    }
    if($password_seeker=="" or $password_seeker!= $confirmpass_seeker){
        $_SESSION['arrseeker']['password_seeker']=[$password_seeker,"yes"];
            $bool=false;
    }
    if($confirmpass_seeker=="" or $password_seeker!= $confirmpass_seeker){
        $_SESSION['arrseeker']['confirmpass_seeker']=[$confirmpass_seeker,"yes"];
            $bool=false;
    }
    if($career_seeker==""){
        $_SESSION['arrseeker']['career_seeker']=[$career_seeker,"yes"];
            $bool=false;
    }
    if($bool==false){
         header("Location:register-job-seeker.php");
    }
    else{
        $uploadcv_seeker=$_FILES['uploadcv_seeker']['tmp_name'];
        $fileDestination='/jobsystem/uploads/';
        $fileExt= explode('.',$_FILES['uploadcv_seeker']['name']);
        $fileActualExt=strtolower(end($fileExt));
        $allowed=array('jpg','png','jpeg','pdf');
        if(in_array($fileActualExt,$allowed)){
            if($_FILES['uploadcv_seeker']['error']===0){
                if($_FILES['uploadcv_seeker']['size']>0){
                    $fileNameNew=time().".".$fileActualExt;
                   $fileDestination .=$fileNameNew;
                    print($uploadcv_seeker);
                    if(move_uploaded_file($uploadcv_seeker,$_SERVER['DOCUMENT_ROOT'].$fileDestination)){
                        $block="no";
                        $sql="insert into jobseceer(username,email,phone,passwordd,confirmpassword,barthdata,career,graduate,image,cv,block) values 
                        ('$username_seeker','$email_seeker','$phone_seeker','$password_seeker','$confirmpass_seeker',
                        '$data_seeker','$career_seeker','$graduate_seeker','$image_seeker','$fileDestination','$block') ";
                        mysqli_query($conn,$sql);
                        $_SESSION['arrseeker']="";
                        header("Location:login.php");
                    }else{
                        die("error");
                    }
                }
            }
            else{
    
            }
        }

        
    }


   
    // if($_FILES['uploadcv_seeker']['size']>0){
    //     $uploadcv_seeker = addslashes( file_get_contents ($uploadcv_seeker));
    // }


    
}













else{
    ?>
    <?php
    @session_start();
    if(isset($_POST['sign_in']) or isset($_POST['sign_out'])or isset($_GET['sign_out'])){
        $_SESSION['login_seeker']="";
        $_SESSION['login_provider']="";
        $_SESSION['admin']='no';
    }
    else{
        if($_SESSION['login_seeker']!=""){
           
            ?>
            <script type="text/javascript">
                window.location.href = 'job-seeker.php';
            </script>
            <?php

          }
          elseif($_SESSION['login_provider']!=""){
            ?>
            <script type="text/javascript">
                window.location.href = 'job_provider.php';
            </script>
            <?php
          }
          elseif($_SESSION['admin']=="yes"){
            ?>
            <script type="text/javascript">
                window.location.href = 'admin.php';
            </script>
            <?php
          }
    }
    include_once 'header.php';
    $_SESSION['arrseeker']="";
    $_SESSION['arrprovider']="";
    ?>
    <section class="rejester-form ">
        <div class="cover">
            <h1>Login</h1>
            
           
            <form action="job.php" method="POST" enctype="multipart/form-data">
             
      
                <div class="form-group">
                  <?php $val=$_SESSION['login']; ?>
                  <input type="text" name="username_login" id="UserName" placeholder="UserName" />
                </div>
                <div class="form-group">
                    <input type="password" name="password_login"id="password" placeholder="password">
                </div>
                <div class="alert alert-danger" style="display:
                  <?php 
                  
                    if ($val!="") {
                        if ($val == 'yes') {
                            echo "block";
                        } else {
                            echo "none";
                        }
                    }
                  
                  ?>"  role="alert">UserName or password is Not Valid</div>
    
    
                <button type="submit" name="job" class="btn btn-primary">Submit</button>
            </form>
        </div>
    
    
    </section>
    
    <?php
    
    include_once 'fotter.php';
    ?>
<?php   
   
}
?>

 <!-- $conn = mysqli_connect('localhost', "root", "","jobs");
          $sql='select * from jobseceer';
          $table=mysqli_query($conn,$sql);
          while($row = mysqli_fetch_array($table)){
           
              
             echo $row['username'].'<img src="data:image/jpeg;base64,'.base64_encode($row['image']).' "/>'."<br>";
             
           
          } 
        -->



        <!--  -->