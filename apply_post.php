<?php
@session_start();
if (isset($_POST['create_post'])) {
    $company=$_SESSION['login_provider'];
    $com_id=$company['id'];
    $title=$_POST['Title'];
    $location=$_POST['Location'];
    $description=$_POST['Description'];
    $career=$_POST['Career'];
    $conn = mysqli_connect('localhost', "root", "","jobs");
    $company=$_SESSION['login_provider'];
    if($title!=""or$location!=""or$description!=""or$career!=""){
        $sql="insert into posts(com_id,title,location,description,career) values 
        ('$com_id','$title','$location','$description','$career') ";
        mysqli_query($conn,$sql);
        header("Location:job_provider.php");
    }
    else{
        header("Location:job_provider.php");
    }
    
}


if (isset($_GET['id_post'])) {
    $id=$_GET['id_post'];
    $conn = mysqli_connect('localhost', "root", "","jobs");
    $company=$_SESSION['login_provider'];
    $sql="delete from posts where id = ".$id;
    mysqli_query($conn,$sql);
    header("Location:job_provider.php");
}

if (isset($_GET['id_post_apply'])) {
    $user=$_SESSION['login_seeker'];
    $id=$_GET['id_post_apply'];
    $conn = mysqli_connect('localhost', "root", "","jobs");
    $sql='select * from apply where postid ='.$id .' and sekeerid ='.$user['id'];
    echo $sql;
    $result=mysqli_query($conn,$sql);
    $user_id=$user['id'];
    $result=(mysqli_num_rows($result));
    if($result==0){
        $sql="insert into apply(postid,sekeerid)values('$id','$user_id') ";
        mysqli_query($conn,$sql);
        $_SESSION['apply']="yes";
        header("Location:job_provider.php");
    }
    else{
        print_r($result);
        $_SESSION['apply']="no";
        header("Location:job_provider.php");
    }
    
}
?>