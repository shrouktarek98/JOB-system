<?php @session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    
    <link rel='stylesheet' type='text/css' media='screen' href='assets/css/bootstrap.css'>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" > -->

    <link rel='stylesheet' type='text/css' media='screen' href='assets/css/header.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='assets/css/posts_apply.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='assets/css/provider.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='assets/css/update_post.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='assets/css/regesiter-job.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='assets/css/home.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='assets/css/font/fontawesome.css'>
    <!-- <link rel='stylesheet' type='text/css' media='screen' href='assets/css/fontawesome.min.css'> -->
    <link rel="stylesheet" type='text/css' href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <script  src='assets/js/jquery-3.3.1.js'></script>
    
    
</head>
<body>

<nav class="navbar  navbar-inverse navbar-fixed-top">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Job<span>System.</span></a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="home.php">Home<span class="sr-only">(current)</span></a></li>
              <li><a href="about-us.php">About Us</a></li>
              <?php 
                  if(isset($_SESSION['login_seeker'])&& $_SESSION['login_seeker']!="")
                     {$seeker=$_SESSION['login_seeker'];} 
                  else
                     {$seeker="";}
                  if(isset($_SESSION['login_provider'])&& $_SESSION['login_provider']!="")
                     {$provider=$_SESSION['login_provider'];} 
                  else
                     {$provider="";}   

              ?> 
              <li class="dropdown" style="display: <?php if($seeker or $provider){ echo 'none';} else{echo 'block';}?> ">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Contact<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="register-job-seeker.php">Job Seeker</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="register-job-provider.php">Job provider</a></li>
                
                 

                </ul>
              </li>
              
              <li id="log_in" style="display: <?php if($seeker or $provider){ echo 'none';} else{echo 'block';}?> ">
                <form action="login.php" method="POST"   >
                   <button type="submit" id="sign_in" name="sign_in">Sign in</button>
                </form>
              </li>
              <li style="display: <?php if($provider){ echo 'block';} else{echo 'none';}?> "><a href="job_provider.php">Posts</a></li>
              <li style="display: <?php if($provider){ echo 'block';} else{echo 'none';}?> ">
                <form action="login.php" method="POST"   >
                  <button type="submit" id="sign_out" class="sign_out_provider" name="sign_out">Sign out</button>
                </form>
              </li>
              
              <li id="log_out" style="display: <?php if(!$seeker){ echo 'none';} else{echo 'block';}?> " >
               
              <a href="#" id="imgg" class="dropdown-toggle imgg" data-toggle="dropdown" role="button" aria-haspopup="true" 
              aria-expanded="false"><?php if($seeker){ echo '<img class="image_out" src="data:image/jpeg;base64,'.base64_encode($seeker['image']).' "/>' ; } ?></a>
                <div class="profile dropdown-menu">
                  <div  class="container-fluid">
                    <div class="row">
                      <div class="col-sm-5">
                        
                        <?php   
                        if($seeker){
                        
                          echo '<img  class="img_profile" src="data:image/jpeg;base64,'.base64_encode($seeker['image']).' "/>';
                        
                        } ?> 
                      </div>
                      <div class="col-sm-7 info">
                        <?php
                        if($seeker){
                          ?>

                        <h4><?php echo $seeker['username'] ?></h4>
                        <h5><?php echo $seeker['email'] ?></h5>
                        <a href="job-seeker.php" >View profile</a>
                        <?php
                        } ?>
                      </div>
                    </div>
                    <div class="row line"></div>
                    <div class="row signout"> 
                      
                      <form action="login.php" method="POST"   >
                        <button type="submit" id="sign_out" class="sign_out_seeker" name="sign_out">Sign out</button>
                      </form>
                    </div>
                  </div>
                </div>
              </li>
             
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- end of container -->
      </nav>
        
      <?php
          echo explode(__DIR__."\\",get_included_files()[0])[1];
      ?> 
      