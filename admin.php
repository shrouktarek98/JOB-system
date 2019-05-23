<?php
@session_start();
include_once 'header_admin.php';
if(isset($_SESSION['admin'])&&$_SESSION['admin']=="yes"){
    ?>
      <div class="seeker container" >
          
        
        <div class="row">
            <div class="col-md-9">
            <h1 style="margin:70px 0px 20px;text-align:center">Posts</h1>
                <?php
                $conn = mysqli_connect('localhost', "root", "","jobs");
                $sql='select * from posts'  ;
                $table=mysqli_query($conn,$sql);
                while($row = mysqli_fetch_array($table)){;
                    $sql='select * from jobprovider where id='. $row['com_id'] ;
                    $company=mysqli_query($conn,$sql);
                    $company=mysqli_fetch_array($company);
                    
                    ?>
                    <div class="posts">
                        <h2 style="text-decoration:underline;color:#706f6f;margin-bottom:15px"><?php echo  $company['username'] ?></h2>
                        <h3><?php echo $row['title'] ?></h3>
                        <span><?php echo $row['location'] ?></span>
                        <p><?php echo $row['description'] ?></p>
                        <i class="fas fa-edit"></i>
                        <!-- <a href="#editEmployeeModal"  class="edit" data-toggle="modal">Updata</a> -->
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
    
      
    <?php
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


<div id="editEmployeeModal" class="modal fade" >
		<div class="modal-dialog">
			<div class="modal-content">
                <?php
                $conn = mysqli_connect('localhost', "root", "","jobs");
               
                
                // $sql='select * from posts where id='. $id;
                ?>
				<form role="form"  action="/edit"  method="get">
				
					<div class="modal-header">						
						<h4 class="modal-title">Edit Post</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">	
						<input id="edit_id" type="text" class="form-control" required style="display:none" name="id" >				
						<div class="form-group">
							<label>Title</label>
							<input id="edit_name" type="text" class="form-control" required name="name">
						</div>
						<div class="form-group">
							<label>Location</label>
							<input id="edit_email" type="email" class="form-control" required name="email">
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea id="edit_Address" class="form-control" required name="address"></textarea>
						</div>				
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-info" value="Save">
					</div>
				</form>
			</div>
		</div>
    </div>    
      

 <?php
    
    include_once 'fotter.php';
    ?>
