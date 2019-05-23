<?php
include_once 'header.php';
?>
<?php
@session_start();
if(isset($_SESSION['login_provider'])&& $_SESSION['login_provider']!=""){
    $conn = mysqli_connect('localhost', "root", "","jobs");
    $sql='select * from careers';
    $table=mysqli_query($conn,$sql);
    $company=$_SESSION['login_provider'];
    ?>
    <div class="provider">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="create_post">
                        <h5>Create post</h5>
                        <div class="text">
                            <form action="apply_post.php" method="POST">
                                <input type="text" placeholder="Title" name="Title">
                                <input type="text" placeholder="Location" name="Location">
                                <textarea placeholder="Description of  your post " name="Description"></textarea>
                                <select name="Career">
                                    <option value="">Choice career</option>
                                    <?php
                                    while($row = mysqli_fetch_array($table)){
                                        echo '<option value="'. $row['id'].'">'.$row['career_name'].'</option>';
                                    }
                                    ?>

                                </select>
                                <div class="buttons">
                                    <button type="submit"class="btn btn-info" name="create_post">Post</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="company_info">
                        <h4><?php echo $company['username'] ?></h4>
                        <span><?php echo $company['email'] ?></span>
                        <div class="line"></div>
                        <a href="posts_apply.php" type="button" class="btn btn-danger">Posts apply</a>
                    </div>
                </div>
            </div>   
            
            <div class="row">
                <div class="col-md-9">
                    <?php
                    $conn = mysqli_connect('localhost', "root", "","jobs");
                    $sql='select * from posts where com_id ='. $company['id'] ;
                    $table=mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_array($table)){;
                        ?>
                        <div class="posts">
                            <h3><?php echo $row['title'] ?></h3>
                            <span><?php echo $row['location'] ?></span>
                            <p><?php echo $row['description'] ?></p>
                            <i class="fas fa-edit"></i>
                            <a name="update_post"  href='update_post.php?id_update_post=<?php echo $row['id']; ?>' type="submit" role="button" >Update</a>
                            <i class="fas fa-trash"></i>
                            <a name="remove_post"  href='apply_post.php?id_post=<?php echo $row['id']; ?>' type="submit" role="button" >Remove</a>
                            <i class="fas fa-share"></i>
                            <a name="applies"  href='posts_apply.php?applies_post=<?php echo $row['id']; ?>' type="submit" role="button" >Applies</a>
                            
                        </div>
                        <?php
                    }

                    ?>
                
                </div>
                
            </div>
        </div>
    </div>
    <?php


}
else if(isset($_SESSION['login_seeker'])&&$_SESSION['login_seeker']!=""){
    ?>
    <script type="text/javascript">
        window.location.href = 'job-seeker.php';
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
