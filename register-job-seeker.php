<?php
include_once 'header.php';

session_start();

$conn = mysqli_connect('localhost', "root", "","jobs");
$sql='select * from careers';
$careers=mysqli_query($conn,$sql);
?>

<section class="rejester-form ">
    <div class="cover">
        <h1>Job Seceer</h1>
        
       
        <form action="login.php" method="POST" enctype="multipart/form-data">
         
  
            <div class="form-group">
              <?php if(isset($_SESSION['arrseeker'])) {
                  $val=$_SESSION['arrseeker'];
              } ?>
              <input type="text" name="username_seeker" id="UserName" placeholder="UserName" value="<?php if(isset($val['username_seeker'][0])){
               
                  echo $val['username_seeker'][0];
              }?>" />
              <span class="asterisx">*</span>
              
              <div class="alert alert-danger" style="display:
              <?php 
              
                if ($val!="") {
                    if ($val['username_seeker'][1] == 'yes') {
                        echo "block";
                    } else {
                        echo "none";
                    }
                }
              
              ?>" id="alertusername" role="alert">UserName is Not Valid</div>
                
              
            </div>
            <div class="form-group">
                <input type="email" name="email_seeker" placeholder="E-mail" id="email" value="<?php if(isset($val['email_seeker'][0])){
               
               echo $val['email_seeker'][0];
            }?>">
                <span class="asterisx">*</span>
                <div class="alert alert-danger" id="alertemail" role="alert"style="display:
              <?php 
                if ($val!="") {
                    if ($val['email_seeker'][1] === 'yes') {
                        echo "block";
                    } else {
                        echo "none";
                    }
                }
              
              ?>">E-mail is Not Valid</div>
            </div>

            <input type="tel" name="phone_seeker" placeholder="Mobile"value="<?php if(isset($val['phone_seeker'][0])){
               
               echo $val['phone_seeker'][0];
            }?>">

            <div class="form-group">
                <input type="password" name="password_seeker"id="password" placeholder="password">
                <span class="asterisx">*</span>
                <div class="alert alert-danger"id="alertpass" role="alert"style="display:
              <?php 
                if ($val!="") {
                    if ($val['password_seeker'][1] === 'yes') {
                        echo "block";
                    } else {
                        echo "none";
                    }
                }
              
              ?>">Password is Not Valid</div>
            </div>

            <div class="form-group">
                <input type="password" name="confirmpass_seeker" id="confirmpwd"placeholder="Confirm Password">
                <span class="asterisx">*</span>
                <div class="alert alert-danger" id="alertconfirmpass"role="alert">Confirm password is Not equal password</div>
              <div class="alert alert-danger" id="alertconfirmpassvalid" role="alert"style="display:
              <?php 
                if ($val!="") {
                    if ($val['confirmpass_seeker'][1] === 'yes') {
                        echo "block";
                    } else {
                        echo "none";
                    }
                }
              
              ?>">Confirm password is Not valid</div>
            </div>

            <input type="date" name="data_seeker" placeholder="Barth Date"value="<?php if(isset($val['data_seeker'][0])){
               
               echo $val['data_seeker'][0];
            }?>">

            <div class="form-group">
                <select name="career_seeker" id="career">

                <option value="">Choice career</option>
                <?php
                while($row = mysqli_fetch_array($careers)){
                    echo '<option value="'. $row['id'].'">'.$row['career_name'].'</option>';
                }
                ?>

                </select>
                <span class="asterisx">*</span>
                <div class="alert alert-danger" id="alertcareer"role="alert"style="display:
              <?php 
                if ($val!="") {
                    if ($val['career_seeker'][1] === 'yes') {
                        echo "block";
                    } else {
                        echo "none";
                    }
                }
              ?>">Choice career</div>
            </div>
            <select name="graduate_seeker">
                <option>Graduation Year</option>
                <?php 
                for ($i=date('Y')+20; $i >= 1900; $i--) { ?>
                <option><?php echo $i ?></option>
                <?php } ?>
            </select>

            <div class="avatar-upload">
                <div class="avatar-edit">
                    <input type='file' id="imageUpload" name="image_seeker" accept=".png, .jpg, .jpeg"value="<?php if(isset($val['image_seeker'][0])){
               
               echo $val['image_seeker'][0];
            }?>" />
                    <label for="imageUpload"><i class="fas fa-pen"></i></label>
                </div>
                <div class="avatar-preview">
                    <div id="imagePreview" style="background-image: url(./assets/image/connect.jpg);">
                    </div>
                </div>
            </div>
            <!-- <input type='file' name="upload-cv" value="Upload CV" /> -->
            <div class="upload-cv">
                <input type='file' id="uploadCV" name="uploadcv_seeker" value="Upload CV" />
                <label for="uploadCV">Upload CV</label>
                <div id="showcv"></div>
            </div>

            <button type="submit" name="rejesterjobseceer" class="btn btn-primary">Submit</button>
        </form>
    </div>


</section>

<?php

include_once 'fotter.php';
?>