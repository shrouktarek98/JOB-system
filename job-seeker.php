<?php
include_once 'header.php';

@session_start();
if($_SESSION['login_seeker']!=""){
    
    ?>

    <div class="seeker container" >
        <h4>Explore New Career Opportunities</h4>
        <div class="row">
            <div class="col-md-9">
                <?php
                $user=$_SESSION['login_seeker'];
                $conn = mysqli_connect('localhost', "root", "","jobs");
                $sql='select * from posts where career ='. $user['career'] ;
                $table=mysqli_query($conn,$sql);
                while($row = mysqli_fetch_array($table)){;
                    ?>
                    <div class="posts">
                        <h3><?php echo $row['title'] ?></h3>
                        <span><?php echo $row['location'] ?></span>
                        <p><?php echo $row['description'] ?></p>
                        <i class="fas fa-share"></i>
                        <a name="apply_post"  href='apply_post.php?id_post_apply=<?php echo $row['id']; ?>' type="submit" role="button" >Apply</a>
                        <i class="fas fa-times"></i>
                        <a name="hide_post" onclick="hide_post('hide_post<?php echo $row['id'] ?>')" id="hide_post<?php echo $row['id'] ?>" type="submit" role="button" >hide</a>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

    </div>

    <?php
    if(isset($_SESSION['apply'])&&$_SESSION['apply']=='no'){
        echo "<script>alert('You are apply of this job before')</script>";
    }elseif(isset($_SESSION['apply'])&&$_SESSION['apply']=='yes'){
        echo "<script>alert('You are apply success')</script>";
    }
    $_SESSION['apply']='';
}
else if($_SESSION['login_provider']!=""){
    ?>
    <script type="text/javascript">
        window.location.href = 'job-provider.php';
    </script>
    <?php
}
else if(isset($_SESSION['admin'])&&$_SESSION['admin']=="yes"){
    ?>
    <script type="text/javascript">
        window.location.href = 'admin.php';
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
<?php
include_once 'fotter.php';
?>


<script >
    hide_post=function (path) {
        $('#'+path).parent().hide();
    }
</script>