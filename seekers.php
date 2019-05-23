<?php
@session_start();

include_once 'header_admin.php';
?>
<div class="container">
<div class="space"></div>
<div class="row">
<?php

if ( (isset($_SESSION['admin'])&& $_SESSION['admin']=="yes")) {
    if(isset($_GET['seekers'])){
        $conn = mysqli_connect('localhost', "root", "","jobs");
        $sql='select * from jobseceer';
        $result=mysqli_query($conn,$sql);
        
        while($row = mysqli_fetch_array($result)){
            $sql='select * from careers where id='.$row['career'];
            $career=mysqli_query($conn,$sql);
            $career=mysqli_fetch_array($career);
            // echo $career['career_name'];
            ?>
            <div class="col-md-4 col-sm-6">
                <div class="post">
                    <figure>
                    <img class="image" src="<?php echo 'data:image/jpeg;base64,'.base64_encode($row['image'] ) ?>"/>
                    </figure>
                    <div class="info">

                    <h3><?php echo $career['career_name'] ?></h3>
                    <h4><?php echo $row['username'] ?></h4>
                    <span><?php echo $row['email'] ?></span>
                    <h5><?php echo $row['phone'] ?></h5>
                    <h4>Barth data: <span><?php echo $row['barthdata'] ?></span></h4>
                    <h4>Graduate: <span><?php echo $row['graduate'] ?></span></h4>
                    <a download href="<?php echo $row['cv'] ?>">Download CV</a>
                    </div>
                </div>
            </div>
        <?php

        }
    }
    

}

else if(isset($_SESSION['login_seeker'])&&$_SESSION['login_seeker']!=""){
    ?>
    <script type="text/javascript">
        window.location.href = 'job-seeker.php';
    </script>
    <?php
}
else if(isset($_SESSION['login_provider'])&&$_SESSION['login_provider']!=""){
    ?>
    <script type="text/javascript">
        window.location.href = 'job-provider.php';
    </script>
    <?php
}
else{
    $_SESSION['login']="no";
    ?>
    <script type="text/javascript">
        window.location.href = 'login.php';
    </script>
    <?php
}
?>
</div>
</div>

    
<?php
include_once 'fotter.php';
?>