<?php
include_once 'header.php';
session_start()
?>
<?php
if($_SESSION['login_provider']!="" or $_SESSION['login_seeker']!=""){
  ?>
  <script>
    $('#sign-in-out').text('Sign Out');
  </script>
  <?php
}
else{
  ?>
  <script>
    $('#sign-in-out').text('Sign In');
  </script>
  
  <?php
}
?>
<section class="rejester-form ">
    <div class="cover">
      <h1>Job provider</h1>
      <form  action="login.php" method="POST">
      <?php if(isset($_SESSION['arrprovider'])) {
          $val=$_SESSION['arrprovider'];
      }?>
 
          <div class="form-group">
              <input type="text" name="username_provider"id="UserNamep" placeholder="UserName"value="<?php if(isset($val['username_provider'][0])){
                  
                  echo $val['username_provider'][0];
              }?>" />
              <span class="asterisx">*</span>
              
              <div class="alert alert-danger" style="display:
              <?php 
              
                if ($val!="") {
                    if ($val['username_provider'][1] == 'yes') {
                        echo "block";
                    } else {
                        echo "none";
                    }
                }
              
              ?>" id="alertusernamep" role="alert">UserName is Not Valid</div>
          </div>
          <div class="form-group"> 
              <input type="email" name="email_provider" placeholder="E-mail"id="emailp" value="<?php if(isset($val['email_provider'][0])){
                  
                  echo $val['email_provider'][0];
                }?>">
                    <span class="asterisx">*</span>
                    <div class="alert alert-danger" id="alertemailp" role="alert"style="display:
                  <?php 
                    if ($val!="") {
                        if ($val['email_provider'][1] === 'yes') {
                            echo "block";
                        } else {
                            echo "none";
                        }
                    }
                  
                  ?>">E-mail is Not Valid</div>
          </div>    
          <div class="form-group">    
              <input type="password" name="password_provider" id="passwordp"placeholder="password">
              <span class="asterisx">*</span>
              <div class="alert alert-danger"id="alertpassp" role="alert"style="display:
                  <?php 
                    if ($val!="") {
                        if ($val['password_provider'][1] === 'yes') {
                            echo "block";
                        } else {
                            echo "none";
                        }
                    }
                  
              ?>">Password is Not Valid
          </div>
          </div>
          <div class="form-group">
              <input type="password" name="confirmpass_provider" placeholder="Confirm Password"id="confirmpwdp">
              <span class="asterisx">*</span>
              <div class="alert alert-danger" id="alertconfirmpassp"role="alert">Confirm password is Not equal password</div>
              <div class="alert alert-danger" id="alertconfirmpassvalidp" role="alert"style="display:
              <?php 
                    if ($val!="") {
                        if ($val['confirmpass_provider'][1] === 'yes') {
                            echo "block";
                        } else {
                            echo "none";
                        }
                    }
                  
              ?>">Confirm password is Not valid</div>
          </div>
          
          <button type="submit" name="rejesterjobprovider" class="btn btn-primary">Register</button>
      </form>
    </div>


  </section>
<?php
include_once 'fotter.php';
?>
