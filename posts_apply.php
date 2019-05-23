<?php
@session_start();
if(isset($_SESSION['login_provider'])&& $_SESSION['login_provider']!=""){
    include_once 'header.php';
}
elseif (isset($_SESSION['admin'])&& $_SESSION['admin']=="yes") {
    include_once 'header_admin.php';
}
?>
<div class="container">
<div class="space"></div>
<div class="row">
<?php

if ((isset($_SESSION['login_provider'])&& $_SESSION['login_provider']!="") or (isset($_SESSION['admin'])&& $_SESSION['admin']=="yes")) {
    if(isset($_GET['applies_post'])){
        $conn = mysqli_connect('localhost', "root", "","jobs");
        $sql='select * from apply where postid='.$_GET['applies_post'];
        $table=mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($table)){
            $sql='select * from jobseceer where id='.$row['sekeerid'];
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
                $result=mysqli_fetch_array($result);
                $sql='select * from careers where id='.$result['career'];
                $career=mysqli_query($conn,$sql);
                $career=mysqli_fetch_array($career);
                ?>
                <div class="col-md-4 col-sm-6">
                    <div class="post">
                        <figure>
                        <img class="image" src="<?php echo 'data:image/jpeg;base64,'.base64_encode($result['image'] ) ?>"/>
                        </figure>
                        <div class="info">

                        <h3><?php echo $career['career_name'] ?></h3>
                        <h4><?php echo $result['username'] ?></h4>
                        <span><?php echo $result['email'] ?></span>
                        <h5><?php echo $result['phone'] ?></h5>
                        <h4>Barth data: <span><?php echo $result['barthdata'] ?></span></h4>
                        <h4>Graduate: <span><?php echo $result['graduate'] ?></span></h4>
                        <a download href="<?php echo $result['cv'] ?>">Download CV</a>
                        </div>
                    </div>
                </div>
                <?php
            }
            
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