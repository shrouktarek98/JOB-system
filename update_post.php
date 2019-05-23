<?php
@session_start();
if(isset($_POST['update'])){
	$id=$_POST['id_post'];
	$title=$_POST['title_post'];
	$location=$_POST['location_post'];
	$description=$_POST['Description_post'];

	$conn = mysqli_connect('localhost', "root", "","jobs");
	$sql=" UPDATE  posts set title= '$title', location= '$location' , description= '$description' where id= '$id'" ;
	
	mysqli_query($conn,$sql);
	if(isset($_SESSION['admin'])&& $_SESSION['admin']=="yes")
	{
		 header("Location:admin.php");
	}
	elseif(isset($_SESSION['login_provider'])&& $_SESSION['login_provider']!="")
	{
		 header("Location:job_provider.php");
	}
}
if(isset($_SESSION['login_provider'])&& $_SESSION['login_provider']!=""){
    include_once 'header.php';
}
elseif (isset($_SESSION['admin'])&& $_SESSION['admin']=="yes") {
    include_once 'header_admin.php';
}
?>
<?php
if(isset($_GET['id_update_post'])){
	$update_id=$_GET['id_update_post'];

?>
<div id="editEmployeeModal" class="modal  update_post" >
		<div class="modal-dialog">
			<div class="modal-content">
                <?php
                $conn = mysqli_connect('localhost', "root", "","jobs");
								$sql='select * from posts where id='. $update_id;
								$result=mysqli_query($conn,$sql);
								$result=mysqli_fetch_array($result);
							
								?>
							
				<form   action="update_post.php"  method="POST">
				
					<div class="modal-header">						
						<h4 class="modal-title">Edit Post</h4>
					</div>
					<div class="modal-body">	
						 <input type="text" class="form-control" required style="display:none" name="id_post" value="<?php echo $result['id']?>">
						<div class="form-group">
							<label>Title</label>
							<input id="edit_title" type="text" class="form-control" required name="title_post" value="<?php echo $result['title']?>">
						</div>
						<div class="form-group">
							<label>Location</label>
							<input id="edit_location" type="text" class="form-control" required name="location_post" value="<?php echo $result['location']?>">
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea id="edit_Description" class="form-control" required name="Description_post" ><?php echo $result['description']?></textarea>
						</div>				
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-info" name="update" value="Save">
					</div>
				</form>
			</div>
		</div>
		</div> 
		   

<?php
}
?>
<?php
include_once 'fotter.php';
?>      